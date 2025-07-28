<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(){
        return view('index');
    }

    public function authenticate(Request $req){
        $validator = Validator::make($req->all(), [
            'email' => 'required|email', 
            'password' => 'required|min:8|max:15'
        ], [
            'email.required' => 'E-poçt sahəsi boş buraxılmamalıdır.',
            'email.email' => 'Geçərli bir e-poçt giriniz.',
            'password.required' => 'Şifrə sahəsi boş buraxılmamalıdır.',
            'password.min' => 'Şifrə minimum :min karakter olmalıdır.',
            'password.max' => 'Şifrə maksimum :max karakter olmalıdır.',
        ]);
        
        if($validator->passes()){
            if(Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password])){
                if(Auth::guard('admin')->user()->status != '2'){
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.index')->with('error','You are not authorized to access this page');
                }
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.index')->with('error','Either email or password is incorrect');
            }
        } else {
            return redirect()->route('admin.index')->withInput()->withErrors($validator);
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.index');
    }
}

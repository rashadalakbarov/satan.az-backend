<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Elan;

use Illuminate\Support\Facades\Validator;

class DashboardProfileController extends Controller
{
    public function index(){
        $user = Auth::guard('phone')->user();
        
        $elanlar = Elan::where('user_id', $user->id)->get();

        return view('profile.index', compact('user', 'elanlar'));
    }

    public function logout(Request $request) {
        Auth::guard('phone')->logout();

        // Session'ı temizle
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // veya ana sayfa
    }

    public function user(Request $request, string $phone) {
        $request->merge([
            'exampleName' => trim($request->input('exampleName'))
        ]);

        $validator = Validator::make($request->all(), [
            'exampleName' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'exampleEmail' => 'required|email',
        ], [
            'exampleName.required' => 'İstifadəçinin adı boş buraxılmamalıdır.',
            'exampleName.string' => 'İstifadəçinin adı mətn şəklində olmalıdır.',
            'exampleName.max' => 'İstifadəçinin adı ən çox :max simvol ola bilər.',
            'exampleName.regex' => 'Ad yalnız hərflər, boşluq və tire (-) simvolundan ibarət ola bilər.',

            'exampleEmail.required' => 'E-poçt sahəsi boş buraxılmamalıdır.',
            'exampleEmail.email' => 'Geçərli bir e-poçt giriniz.',
        ]);

        if($validator->passes()){
            $user = User::where('phone', $phone)->firstOrFail();
            $user->name = $request->exampleName;
            $user->email = $request->exampleEmail;
            $user->save();

            return redirect()->route('profile.index', ['tab' => 'profile'])->with('success', 'Profil məlumatları yeniləndi.');
        } else {
             return redirect()->route('profile.index', ['tab' => 'profile'])->withInput()->withErrors($validator);
        }
    }
}

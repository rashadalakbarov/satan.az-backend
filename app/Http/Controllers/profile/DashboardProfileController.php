<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DashboardProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }

    public function logout(Request $request) {
        Auth::guard('phone')->logout();

        // Session'ı temizle
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // veya ana sayfa
    }
}

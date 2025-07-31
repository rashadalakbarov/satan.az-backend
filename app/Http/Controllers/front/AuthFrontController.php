<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;

use App\Models\PhoneOtp;

class AuthFrontController extends Controller
{
    public function index(){
        return view('front.login');
    }

    public function sendOtp(Request $request) {
        $request->validate([
            'phone' => [
                'required',
                'regex:/^\+994(50|51|55|70|77|99)\s\d{3}\s\d{2}\s\d{2}$/'
            ],
        ], [
            'phone.required' => 'Telefon nömrəsi boş buraxılmamalıdır.',
            'phone.regex' => 'Telefon nömrəsi "+994XX XXX XX XX" formatında olmalıdır.',
        ]);

        $phoneotp = PhoneOtp::where('phone', $request->phone)->first();

        if (!$phoneotp) {
            $phoneotp = new PhoneOtp();
            $phoneotp->phone = $request->phone;
        }
        
        $otp = rand(100000, 999999); // 6 haneli OTP
        $phoneotp->otp = $otp;
        $phoneotp->otp_expires_at = now()->addMinutes(5);
        $phoneotp->save();

        // Burada SMS gönderimi yapılır (örneğin: Twilio, NetGSM, Infobip, Melipayamak vs.)
        // Sadece örnek:
        logger("OTP kodu: $otp");

        return view('front.verify-otp',  [
            'phone' => $phoneotp->phone,
            'otp' => $phoneotp->otp
        ]);
    }

    public function verifyOtp(Request $request) {
        $request->validate([
            'phone' => 'required',
            'otp' => 'required',
        ], [
            'otp.required' => 'OTP kod boş buraxılmamalıdır.',
            'phone.required' => 'Telefon nömrəsi boş buraxılmamalıdır.',
        ]);

        $phoneotp = PhoneOtp::where('phone', $request->phone)
                    ->where('otp', $request->otp)
                    ->where('otp_expires_at', '>', now())
                    ->first();

        if (!$phoneotp) {
            return back()->withErrors(['otp' => 'OTP kod keçərsizdir ya da vaxtı bitmişdir.']);
        }

        if ($phoneotp && $phoneotp->otp === $request->otp) {
            $user = User::where('phone', $phoneotp->phone)->first();

            if ($user) {
                // Giriş yap
                Auth::guard('phone')->login($user);
                
                // OTP sıfırla
                $phoneotp->otp = null;
                $phoneotp->otp_expires_at = null;
                $phoneotp->save();

                return redirect()->route('profile.index'); // veya istediğin sayfa
            } else {
                $user = User::create([
                    'phone' => $phoneotp->phone,
                    'name' => '',
                    'email' => '',
                ]);

                // Giriş yap
                Auth::guard('phone')->login($user);
                
                // OTP sıfırla
                $phoneotp->otp = null;
                $phoneotp->otp_expires_at = null;
                $phoneotp->save();

                return redirect()->route('profile.index'); // veya istediğin sayfa
            }
        }

        

        
    }
}

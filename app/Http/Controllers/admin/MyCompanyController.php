<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Config;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Storage;

class MyCompanyController extends Controller
{
    public function edit(){
        $settings = Config::all()->pluck('value', 'key');
        return view('mycompany', compact('settings'));
    }

    public function update(Request $request){
        $request->validate([
            'company_name' => 'required|string',
            'company_logo' => 'nullable|image|max:2048',
        ]);
        Config::setValue('site_name', $request->input('company_name'));

        if ($request->hasFile('company_logo')) {
            $file = $request->file('company_logo');

            $filename = time() . '_' . $file->getClientOriginalName();

            // Önceki logoyu sil
            $oldPath = Config::getValue('logo_url');
            if ($oldPath && Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }

            // Yeni logoyu kaydet
            $path = $file->store('logo', 'public'); // storage/app/public/logo

            // Veritabanına kaydet
            Config::setValue('logo_url', $path);
        }

        return redirect()->back()->with('success', 'Parametrlər şəkildə uğurla yeniləndi.');
    }

    public function contact(Request $request){
        $request->validate([
            'company_phone' => [
                'required',
                'regex:/^\+994(50|51|55|70|77|99)\s\d{3}\s\d{2}\s\d{2}$/'
            ],
            'company_email' => 'required|email',
            'company_address' => [
                'required',
                'string',
                'min:5',
                'max:255',
                'regex:/^[a-zA-Z0-9əğıöçşƏĞİÖÇŞÜü\s,.\-]+$/u',
            ],
        ], [
            'company_email.required' => 'E-poçt sahəsi boş buraxılmamalıdır.',
            'company_email.email' => 'Geçərli bir e-poçt giriniz.',

            'company_phone.required' => 'Telefon sahəsi boş buraxılmamalıdır.',
            'company_phone.regex' => 'Telefon nömrəsi "+994XX XXX XX XX" formatında olmalıdır.',

            'company_address.required' => 'Ünvan sahəsi boş buraxılmamalıdır.',
            'company_address.string' => 'Ünvan mətn şəklində olmalıdır.',
            'company_address.min' => 'Ünvan ən az :min simvol olmalıdır.',
            'company_address.max' => 'Ünvan ən çox :max simvol ola bilər.',
            'company_address.regex' => 'Ünvan yalnız hərf, rəqəm, boşluq və (, . -) işarələrindən ibarət ola bilər.'
        ]);

        Config::setValue('phone', $request->input('company_phone'));
        Config::setValue('email', $request->input('company_email'));
        Config::setValue('address', $request->input('company_address'));

        return redirect()->back()->with('success', 'Parametrlər şəkildə uğurla yeniləndi.');
    }

    public function social(Request $request){
        $request->validate([
            'company_facebook' => ['nullable', 'url'],
            'company_instagram' => ['nullable', 'url'],
        ], [
            'company_facebook.url' => 'Link düzgün formatda olmalıdır. (məs: https://facebook.com/satan)',
            'company_instagram.url' => 'Link düzgün formatda olmalıdır. (məs: https://instagram.com/satan)',
        ]);

        Config::setValue('facebook_url', $request->input('company_facebook'));
        Config::setValue('instagram_url', $request->input('company_instagram'));

        return redirect()->back()->with('success', 'Parametrlər şəkildə uğurla yeniləndi.');
    }
}

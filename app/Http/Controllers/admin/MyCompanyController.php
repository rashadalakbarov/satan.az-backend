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

        // if ($request->hasFile('company_logo')) {
        //     $image = $request->file('company_logo');
        //     $imageName = 'company_logo.' . $image->getClientOriginalExtension();
        //     $imagePath = public_path('assets/img/' . $imageName);

        //     if (File::exists($imagePath)) {
        //         File::delete($imagePath);
        //     }

        //     $path = $image->move(public_path('assets/img/'), $imageName);
        //     CompanySettings::setValue('logo', $imageName);
        // }

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

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}

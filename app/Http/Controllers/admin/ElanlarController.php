<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Elan;
use App\Models\City;

class ElanlarController extends Controller
{
    public function index(){
        $elanlar = Elan::with('user')->orderBy('id')->paginate(10);        

        return view('elanlar', compact('elanlar'));

    }

    public function show($id) {
        $elan = Elan::with('user', 'city')->findOrFail($id);
        $cities = City::all();

        return view('elanlar-update', compact('elan', 'cities'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'elantitle' => [
                'required',
                'string',
                'min:5',
                'max:255',
                'regex:/^[a-zA-Z0-9əğıöçşƏĞİÖÇŞÜü\s,.\-]+$/u',
            ],
            'elanprice' => 'required|numeric',
            'elan_city' => 'required',
            'elan_description' => [
                'nullable',
                'string',
                'max:2000',
            ],
            'elan_activate' => 'required',
            'elan_status' => 'required',
        ], [
            'elantitle.required' => 'Elan başlığı sahəsi boş buraxılmamalıdır.',
            'elanprice.required' => 'Elan qiyməti boş buraxılmamalıdır.',
            'elan_city.required' => 'Elanın şəhəri boş buraxılmamalıdır.',
            'elan_activate.required' => 'Elanın aktivliyi boş buraxılmamalıdır.',
            'elan_status.required' => 'Elanın statusu boş buraxılmamalıdır.',

            'elantitle.string' => 'Elan başlığı mətn şəklində olmalıdır.',
            'elantitle.min' => 'Elan başlığı ən az :min simvol olmalıdır.',
            'elantitle.max' => 'Elan başlığı ən çox :max simvol ola bilər.',
            'elantitle.regex' => 'Elan başlığı yalnız hərf, rəqəm, boşluq və (, . -) işarələrindən ibarət ola bilər.',

            'elan_description.string' => 'Elan detayı mətn şəklində olmalıdır.',
            'elan_description.max' => 'Elan detayı ən çox :max simvol ola bilər.',
        ]);

        $elan = Elan::findOrFail($id);
        $elan->title = $request->elantitle;
        $elan->price = $request->elanprice;
        $elan->city_id = $request->elan_city;
        $elan->description = $request->elan_description;
        $elan->activate = $request->elan_activate;
        $elan->status = $request->elan_status;
        $elan->save();

        return redirect()->back()->with('success', 'Elan başarılı şəkildə yeniləndi.');
    }
}

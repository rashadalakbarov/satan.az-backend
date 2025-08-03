<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Elan;
use App\Models\City;
use App\Models\Category;
use App\Models\Option;
use App\Models\ElanOption;
use App\Models\OptionValue;

class ElanlarController extends Controller
{
    public function index(){
        $elanlar = Elan::with('user')->orderBy('id')->paginate(10);        

        return view('elanlar', compact('elanlar'));

    }

    public function show($id) {
        $elan = Elan::with('user', 'city', 'option.category')->findOrFail($id);
        $cities = City::all();
        $mainCategories = Category::whereNull('parent_id')->where('activate', 'active')->with('children')->get();

        // Seçili kategoriye ait tüm optionlar
        $selectedCategoryId = optional($elan->option)->category_id;
        $options = Option::with('values')
            ->where('category_id', $selectedCategoryId)
            ->where('activate', 'active')
            ->get();

        // Mevcut ElanOption kayıtları
        $existingOptions = ElanOption::where('elan_id', $id)->get()->keyBy('option_id');

        return view('elanlar-update', compact('elan', 'cities', 'mainCategories', 'options', 'existingOptions'));
    }

    public function getOptionValues($option_id) {
        $values = OptionValue::
            where('option_id', $option_id)
            ->where('activate', 'active')
            ->pluck('value');

        return response()->json($values);
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
            'category_id' => 'required|exists:categories,id',
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

            'category_id.required' => 'Kateqoriyanın adı boş buraxılmamalıdır.',
            'category_id.exists' => 'Seçilən kateqoriya mövcud deyil.',
        ]);

        $elan = Elan::findOrFail($id);

        $elan->title = $request->elantitle;
        $elan->price = $request->elanprice;
        $elan->city_id = $request->elan_city;
        $elan->description = $request->elan_description;
        $elan->activate = $request->elan_activate;
        $elan->status = $request->elan_status;
        $elan->save();

        dd($request->option);

        // if ($elan->option) {
        //     $elan->option->update([
        //         'category_id' => $request->category_id,
        //         'option_id' => key($request->options), // ilk option
        //         'value' => $request->options[key($request->options)],
        //     ]);
        // } else {
        //     ElanOption::create([
        //         'elan_id' => $elan->id,
        //         'category_id' => $request->category_id,
        //         'option_id' => key($request->options),
        //         'value' => $request->options[key($request->options)],
        //     ]);
        // }

        // ElanOption update
        // Eski ElanOption kayıtlarını sil
        // ElanOption::where('elan_id', $elan->id)->delete();
        
        // 4. Yeni ElanOption'ları ekle
        // $categoryId = $request->category_id;
        // $options = $request->input('options', []); // boş olsa bile hata vermez

        // foreach ($options as $optionId => $value) {
        //     // checkbox tipi ise dizi gelir
        //     $optionValue = is_array($value) ? json_encode($value) : $value;

        //     ElanOption::create([
        //         'elan_id' => $elan->id,
        //         'category_id' => $categoryId,
        //         'option_id' => $optionId,
        //         'value' => $optionValue,
        //     ]);
        // }

        return redirect()->back()->with('success', 'Elan başarılı şəkildə yeniləndi.');
    }
}

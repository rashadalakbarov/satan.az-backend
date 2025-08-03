<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\ElanOption;

use Illuminate\Support\Facades\Validator;

class AddNewController extends Controller
{
    public function index(){
        $mainCategories = Category::whereNull('parent_id')->where('activate', 'active')->with('children')->get();
        return view('front.new', compact('mainCategories'));
    }

    public function getOptions($category_id) {
        $options = Option::where('category_id', $category_id)->where('activate', 'active')->get();

        return response()->json($options);
    }

    public function getOptionValues($option_id) {
        $values = OptionValue::
            where('option_id', $option_id)
            ->where('activate', 'active')
            ->pluck('value');

        return response()->json($values);
    }

    public function store(Request $request) {
        // Kategori zorunlu
       $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
        ], [

            'category_id.required' => 'Kateqoriyanın adı boş buraxılmamalıdır.',
            'category_id.exists' => 'Seçilən kateqoriya mövcud deyil.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }
        
        // return back()->withErrors($validator)->withInput();




        // // Seçilen kategoriye ait option'ları al
        // $options = Option::where('category_id', $request->category_id)->get();

        // // Dinamik validation kuralları
        // $dynamicRules = [];

        // foreach ($options as $option) {
        //     $fieldKey = 'option_' . $option->id;

        //     if ($option->required == 1) {
        //         $dynamicRules[$fieldKey] = $option->type == 'check' ? 'accepted' : 'required|string';
        //     }
        // }

        // // Dinamik alanlar için doğrulama

        // $validator = Validator::make($request->all(), $dynamicRules);

        // if ($validator->fails()) {
        //     // Eğer AJAX isteğiyse JSON ile hata dön
        //     if ($request->ajax()) {
        //         return response()->json([
        //             'status' => 'error',
        //             'errors' => $validator->errors(),
        //         ], 422);
        //     }

        //     return back()->withErrors($validator)->withInput();
        // } 













        // Her option için kayıt oluştur
        // foreach ($options as $option) {
        //     $fieldKey = 'option_' . $option->id;

        //     if ($request->has($fieldKey)) {
        //         ElanOption::create([
        //             'elan_id' => 1, // burayi daha sonra dinamik et
        //             'category_id' => $request->category_id,
        //             'option_id' => $option->id,
        //             'value' => $request->input($fieldKey),
        //         ]);
        //     }
        // }

        return redirect()->back()->with('success', 'Elan uğurla əlavə edildi!');
    }
}

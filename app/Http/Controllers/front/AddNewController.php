<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\ElanOption;

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
        $request->validate([
            'category_id' => 'required|exists:categories,id',
        ]);

        // Seçilen kategoriye ait option'ları al
        $options = Option::where('category_id', $request->category_id)->get();

        // Dinamik validation kuralları
        $dynamicRules = [];

        foreach ($options as $option) {
            $fieldKey = 'option_' . $option->id;

            if ($option->required == 1) {
                $dynamicRules[$fieldKey] = $option->type == 'check' ? 'accepted' : 'required|string';
            }
        }

        // Dinamik alanlar için doğrulama
        $request->validate($dynamicRules);

        // Her option için kayıt oluştur
        foreach ($options as $option) {
            $fieldKey = 'option_' . $option->id;

            if ($request->has($fieldKey)) {
                ElanOption::create([
                    'category_id' => $request->category_id,
                    'option_id' => $option->id,
                    'value' => $request->input($fieldKey),
                ]);
            }
        }

        return redirect()->back()->with('success', 'Elan uğurla əlavə edildi!');
    }
}

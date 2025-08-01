<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Option;

class AddNewController extends Controller
{
    public function index(){
        $mainCategories = Category::whereNull('parent_id')->with('children')->get();
        return view('front.new', compact('mainCategories'));
    }

    public function getOptions($category_id) {
        $options = Option::where('category_id', $category_id)->get();

        return response()->json($options);
    }

    public function store(Request $request) {
        // Kullanıcıyı al
        $user = Auth::guard('phone')->user();

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

            // required = 1 ise zorunlu yap
            if ($option->required == 1) {
                $dynamicRules[$fieldKey] = $option->type == 'check' ? 'accepted' : 'required|string';
            }
        }

        // Dinamik alanlar için doğrulama
        $request->validate($dynamicRules);

        // Elan'ı kaydet
        $elan = Elan::create([
            'user_id' => $user->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            // diğer sabit alanlar...
        ]);

        // ElanOption'lara kaydet
        foreach ($options as $option) {
            $fieldKey = 'option_' . $option->id;
            if ($request->has($fieldKey)) {
                ElanOption::create([
                    'elan_id' => $elan->id,
                    'option_id' => $option->id,
                    'value' => $request->input($fieldKey),
                ]);
            }
        }

        return redirect()->route('profile.index')->with('success', 'Elan uğurla əlavə edildi.');
    }
}

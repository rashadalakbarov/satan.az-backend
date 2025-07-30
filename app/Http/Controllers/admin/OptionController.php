<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Option;
use App\Models\Category;
use App\Models\OptionValue;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = Option::with(['category', 'optionValue'])->latest()->paginate(10);
        return view('options-index', compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('options-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'default_title' => 'required|string|max:255',
            'default_select' => 'required',
            'default_type' => 'required',
            'default_required' => 'required',
            'default_activate' => 'required',
        ], [
            'default_title.required' => 'Özəlliyin adı boş buraxılmamalıdır.',
            'default_title.string' => 'Özəlliyin adı mətn şəklində olmalıdır.',
            'default_title.max' => 'Özəlliyin adı ən çox :max simvol ola bilər.',

            'default_select.required' => 'Kateqoriya seçimi boş buraxılmamalıdır.',
            'default_type.required' => 'Özəlliyin tipi boş buraxılmamalıdır.',
            'default_required.required' => 'Özəlliyin vacibliyi adı boş buraxılmamalıdır.',
            'default_activate.required' => 'Aktivlik boş buraxılmamalıdır.',
        ]);

        $option = Option::create([            
            'title' => $request->default_title,
            'category_id' => $request->default_select,
            'type' => $request->default_type,
            'required' => $request->default_required,
            'activate' => $request->default_activate,
        ]);

        return redirect()->route('admin.options.index')->with('success', 'Özəllik başarıyla əlavə edildi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        $categories = Category::all();
        $optionValue = $option->optionValue()->pluck('value')->toArray();

        return view('options-edit', compact('option', 'categories', 'optionValue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'default_title' => 'required|string|max:255',
            'default_select' => 'required',
            'default_type' => 'required',
            'default_required' => 'required',
            'default_activate' => 'required',
        ], [
            'default_title.required' => 'Özəlliyin adı boş buraxılmamalıdır.',
            'default_title.string' => 'Özəlliyin adı mətn şəklində olmalıdır.',
            'default_title.max' => 'Özəlliyin adı ən çox :max simvol ola bilər.',

            'default_select.required' => 'Kateqoriya seçimi boş buraxılmamalıdır.',
            'default_type.required' => 'Özəlliyin tipi boş buraxılmamalıdır.',
            'default_required.required' => 'Özəlliyin vacibliyi adı boş buraxılmamalıdır.',
            'default_activate.required' => 'Aktivlik boş buraxılmamalıdır.',
        ]);

        $option = Option::findOrFail($id);
        $option->title = $request->default_title;
        $option->category_id = $request->default_select;
        $option->type = $request->default_type;
        $option->required = $request->default_required;
        $option->activate = $request->default_activate;
        $option->save();


        return redirect()->route('admin.options.index')->with('success', 'Özəllik güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->optionValue()->delete();
        $option->delete();

        return redirect()->route('admin.options.index')->with('success', 'Özəllik silindi.');
    }
}

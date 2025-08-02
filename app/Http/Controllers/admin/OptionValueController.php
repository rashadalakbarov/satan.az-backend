<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Option;
use App\Models\OptionValue;

use Illuminate\Support\Facades\Validator;

class OptionValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $options = Option::with('category')
            ->whereIn('type', ['select'])
            ->get()
            ->groupBy(function ($item) {
                return $item->category->name;
            });

        $suboptions = OptionValue::with('option')->latest()->paginate(10);

        return view('suboptions', compact('suboptions', 'options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'default_title' => trim($request->input('default_title'))
        ]);

        $validator = Validator::make($request->all(), [
            'default_select' => 'required',
            'default_title' => 'required|string|max:255|regex:/[^\d\s]/',
            'default_activate' => 'required',
        ], [
            'default_title.required' => 'Alt özəllik sahəsi boş buraxılmamalıdır.',
            'default_title.string' => 'Alt özəllik mətn tipində olmalıdır.',
            'default_title.max' => 'Alt özəllik maksimum :max karakter olmalıdır.',
            'default_title.regex' => 'Alt özəllik sahəsində boşluq vəya rəqəm istifadə etmək olmaz.',

            'default_select.required' => 'Özəllik sahəsi boş buraxılmamalıdır.',

            'default_activate.required' => 'Aktivlik sahəsi boş buraxılmamalıdır.',
        ]);

        if($validator->fails()) {
            return response()->json(["errors" => $validator->errors()]);
        }

        $option = Option::find($request->default_select);

        $suboption = OptionValue::create([
            'category_id' => $option->category_id,
            'option_id' => $request->default_select,
            'value' => $request->default_title,
            'activate' => $request->default_activate,
        ]);

        return response()->json(["success" => $suboption]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(string $id)
    {
        $suboption = OptionValue::findOrFail($id);
        return response()->json(["suboption" => $suboption]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->merge([
            'default_title_edit' => trim($request->input('default_title_edit'))
        ]);

        $validator = Validator::make($request->all(), [
            'default_select_edit' => 'required',
            'default_title_edit' => 'required|string|max:255|regex:/[^\d\s]/',
            'default_activate_edit' => 'required',
        ], [
            'default_title_edit.required' => 'Alt özəllik sahəsi boş buraxılmamalıdır.',
            'default_title_edit.string' => 'Alt özəllik mətn tipində olmalıdır.',
            'default_title_edit.max' => 'Alt özəllik maksimum :max karakter olmalıdır.',
            'default_title_edit.regex' => 'Alt özəllik sahəsində boşluq vəya rəqəm istifadə etmək olmaz.',

            'default_select_edit.required' => 'Özəllik sahəsi boş buraxılmamalıdır.',

            'default_activate_edit.required' => 'Aktivlik sahəsi boş buraxılmamalıdır.',
        ]);

        if($validator->fails()) {
            return response()->json(["errors" => $validator->errors()]);
        }

        $suboption = OptionValue::findOrFail($id);
        $suboption->option_id = $request->default_select_edit;
        $suboption->value = $request->default_title_edit;
        $suboption->activate = $request->default_activate_edit;
        $suboption->save();

        return response()->json(["success" => $suboption]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $suboption = OptionValue::findOrFail($id);
        $suboption->delete();

        return response()->json(["success" => $suboption]);
    }
}

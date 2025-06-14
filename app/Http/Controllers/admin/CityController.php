<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Models\City;

use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    public function index(){
        $cities = City::orderBy('name')->paginate(10);

        return view('cities', compact('cities'));

    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
        ]);

        if($validator->fails()) {
            return response()->json(["errors" => $validator->errors()]);
        }

        $city = City::create([
            'name' => $request->title,
            'slug' => Str::slug($request->title)
        ]);

        return response()->json(["success" => $city]);
    }

    public function show(string $id){
        $city = City::findOrFail($id);

        return response()->json(["city" => $city]);
    }

    public function update(Request $request, string $id){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
        ]);

        if($validator->fails()) {
            return response()->json(["errors" => $validator->errors()]);
        }

        $city = City::findOrFail($id);
        $city->name = $request->title;
        $city->slug = Str::slug($request->title);
        $city->save();

        return response()->json(["success" => $city]);
    }

    public function delete(string $id){
        $city = City::findOrFail($id);
        $city->delete();

        return response()->json(["success" => $city]);
    }
}

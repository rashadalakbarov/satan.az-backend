<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\City;

class CityController extends Controller
{
    public function index() {
        return response()->json(City::select('name', 'slug')->get());
    }
}

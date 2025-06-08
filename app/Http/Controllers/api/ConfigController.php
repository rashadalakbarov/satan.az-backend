<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Config;

class ConfigController extends Controller
{
    public function index() {
        $settings = Config::all()->mapWithKeys(function ($item) {
            return [
                $item->key => [
                    'value' => $item->value,
                    'other' => $item->other, // optional: rename to "other" if you prefer
                ]
            ];
        });

        return response()->json($settings);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request) {
        $community = $request->get('community');
        if ($community) {
            $cities = City::where('community', $community)->get();
        } else {
            $cities = City::all();
        }
        return response()->json(['cities' => $cities]);
    }
    
}

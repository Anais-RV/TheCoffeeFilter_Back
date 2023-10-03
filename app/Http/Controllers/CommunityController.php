<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index() {
        $communities = Community::all();
        return response()->json(['communities' => $communities]);
    }
    
}

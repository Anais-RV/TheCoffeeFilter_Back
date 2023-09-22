<?php

namespace App\Http\Controllers;

use App\Models\CoffeeShop;
use Illuminate\Http\Request;

class CoffeeShopController extends Controller
{
    public function index()
    {
        return CoffeeShop::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $coffeeShop = new CoffeeShop();
        $coffeeShop->name = $request->name;
        $coffeeShop->address = $request->address;
        $coffeeShop->description = $request->description;
        $coffeeShop->photo = $request->photo;
        $coffeeShop->state = $request->state;
        $coffeeShop->save();
        
        return response()->json(['message' => 'CoffeeShop created successfully', 'data' => $coffeeShop]);
    }

    public function show($id)
    {
        return CoffeeShop::find($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $coffeeShop = CoffeeShop::find($id);
        $coffeeShop->name = $request->name;
        $coffeeShop->address = $request->address;
        $coffeeShop->description = $request->description;
        $coffeeShop->photo = $request->photo;
        $coffeeShop->state = $request->state;
        $coffeeShop->save();
        
        return response()->json(['message' => 'CoffeeShop updated successfully', 'data' => $coffeeShop]);
    }

    public function destroy($id)
    {
        $coffeeShop = CoffeeShop::find($id);
        $coffeeShop->delete();
        
        return response()->json(['message' => 'CoffeeShop deleted successfully']);
    }
}

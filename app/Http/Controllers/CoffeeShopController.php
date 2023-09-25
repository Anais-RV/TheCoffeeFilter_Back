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
        // Normalmente aquí retornarías una vista para editar un CoffeeShop ?? API necesario???
        return response()->json(['message' => 'Endpoint for form view.']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'description' => 'string|nullable',
            'photo' => 'url|nullable',
            'state' => 'required|in:Suggested, Approved, Rejected',
        ]);

        $coffeeShop = CoffeeShop::create($validatedData);

        return response()->json(['message' => 'CoffeeShop created successfully', 'data' => $coffeeShop]);
    }

    public function show($id)
    {
        return CoffeeShop::findOrFail($id);
    }

    public function edit($id)
    {
        // Normalmente aquí retornarías una vista para editar un CoffeeShop ?? API necesario???
        return response()->json(['message' => 'Endpoint for edit form view.']);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'description' => 'string|nullable',
            'photo' => 'url|nullable',
            'state' => 'required|in:Suggested, Approved, Rejected',
        ]);

        $coffeeShop = CoffeeShop::findOrFail($id);
        $coffeeShop->update($validatedData);

        return response()->json(['message' => 'CoffeeShop updated successfully', 'data' => $coffeeShop]);
    }

    public function destroy($id)
    {
        $coffeeShop = CoffeeShop::findOrFail($id);
        $coffeeShop->delete();

        return response()->json(['message' => 'CoffeeShop deleted successfully']);
    }
}

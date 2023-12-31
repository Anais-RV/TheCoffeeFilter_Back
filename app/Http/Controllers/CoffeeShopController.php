<?php

namespace App\Http\Controllers;

use App\Models\CoffeeShop;
use Illuminate\Http\Request;

class CoffeeShopController extends Controller
{
    
    public function index()
    {
        $allCoffeeShops = CoffeeShop::where('state', 'Approved')->get();
        return response()->json(['data' => $allCoffeeShops]);
    }

    public function adminIndex()
    {
        $allCoffeeShops = CoffeeShop::all();
        return response()->json(['data' => $allCoffeeShops]);
    }


    public function create()
    {
        // Normalmente aquí retornarías una vista para editar un CoffeeShop ?? API necesario???
        return response()->json(['message' => 'Endpoint for form view.']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'max:255',
            'address' => 'max:255',
            'description' => 'string|nullable',
            'photo' => 'nullable',
            'state' => 'in:Suggested,Approved,Rejected',
            'city_id' => 'integer|exists:cities,id'  
        ]);


        $validatedData['state'] = 'Suggested';

        $coffeeShop = CoffeeShop::create($validatedData);

        return response()->json(['message' => 'CoffeeShop suggested successfully', 'data' => $coffeeShop]);
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
            'name' => 'max:255',
            'address' => 'max:255',
            'description' => 'string|nullable',
            'photo' => 'nullable',
            'state' => 'in:Suggested,Approved,Rejected',
            'city_id' => 'integer|exists:cities,id' 
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

    public function suggestedCoffeeShops()
    {
        $suggestedCoffeeeShops = CoffeeShop::where('state', 'Suggested') ->get();
        return response()->json(['data' =>  $suggestedCoffeeeShops]);
    }

    public function suggest(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'description' => 'string|nullable',
            'photo' => 'nullable|string',
            'city_id' => 'required|integer|exists:cities,id',
        ]);
    
        $validatedData['state'] = 'Suggested';
        $coffeeShop = CoffeeShop::create($validatedData);

        return response()->json([
            'message' => 'CoffeeShop suggestion added successfully!',
            'data' => $coffeeShop
        ], 201);  
    }
    

}

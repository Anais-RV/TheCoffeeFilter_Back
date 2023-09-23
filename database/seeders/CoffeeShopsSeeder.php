<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CoffeeShop;

class CoffeeShopsSeeder extends Seeder
{
  
    public function run()
    {
        // Insertamos un registro ficticio
        CoffeeShop::create([
            'city_id' => 1, 
            'name' => 'Café Central',
            'address' => 'Calle Central 123',
            'description' => 'Una agradable cafetería en el centro de la ciudad.',
            'photo' => 'url/de/la/foto.jpg',
            'state' => 'Approved',
        ]);

        // Puedes agregar más registros de manera similar
    }
}

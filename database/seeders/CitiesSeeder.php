<?php

namespace Database\Seeders;

use App\Models\Community;
use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $asturias = Community::where('name', 'Asturias')->first();
        City::create(['name' => 'Oviedo', 'community_id' => $asturias->id]);

        $madrid = Community::where('name', 'Madrid')->first();
        City::create(['name' => 'Madrid', 'community_id' => $madrid->id]);
    }
}

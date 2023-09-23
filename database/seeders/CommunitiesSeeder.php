<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Community;

class CommunitiesSeeder extends Seeder
{
    
    public function run()
    {
        // Insertamos las comunidades
        $communities = ['Asturias', 'Madrid'];

        foreach ($communities as $community) {
            Community::create(['name' => $community]);
        }
    }
}

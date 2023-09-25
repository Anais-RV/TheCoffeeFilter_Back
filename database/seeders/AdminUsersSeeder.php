<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUsersSeeder extends Seeder
{
    public function run()
{
    User::create([
        'name' => 'Admin',
        'lastname' => 'AdminLastname', // Añade un apellido si es necesario
        'email' => 'admin@TheCoffeeFilter.com',
        'password' => bcrypt('bika'),
        'role' => 'admin',
    ]);
}
}

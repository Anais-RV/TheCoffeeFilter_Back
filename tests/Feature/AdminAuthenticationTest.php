<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminAuthenticationTest extends TestCase
{
    use RefreshDatabase;  // BBDD limpia en cada test

    /** @test */
    public function admin_can_authenticate_with_valid_credentials()
    {
        // Crear admin
        $admin = User::factory()->create([
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        // Credenciales OK
        $response = $this->postJson('/api/admin/login', [
            'email' => 'admin@test.com',
            'password' => 'password'
        ]);

        // Respuesta con token
        $response->assertStatus(200)
                 ->assertJsonStructure(['token']);
    }
}

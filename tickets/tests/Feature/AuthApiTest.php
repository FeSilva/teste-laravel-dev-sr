<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AuthApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_register_successfully()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Usuário Teste',
            'email' => 'teste@example.com',
            'setor' => 'TI',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'access_token',
                     'token_type',
                     'user' => [
                         'id',
                         'name',
                         'email',
                         'setor',
                         'created_at',
                         'updated_at',
                     ],
                 ]);

        $this->assertDatabaseHas('users', [
            'email' => 'teste@example.com',
        ]);
    }
}

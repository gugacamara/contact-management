<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_guest_cannot_access_create_contact(): void
    {
        $response = $this->get('/contacts/create');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_access_create_contact(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/contacts/create');
        $response->assertStatus(200);
    }
}

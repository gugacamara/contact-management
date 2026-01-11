<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;


/**
 * Feature tests for authentication and access control.
 *
 */
class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that a guest user cannot access the create contact page.
     */
    public function test_guest_cannot_access_create_contact(): void
    {
        $response = $this->get('/contacts/create');
        $response->assertRedirect('/login');
    }

    /**
     * Test that an authenticated user can access the create contact page.
     */
    public function test_authenticated_user_can_access_create_contact(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/contacts/create');
        $response->assertStatus(200);
    }
}

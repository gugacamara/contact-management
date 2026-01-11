<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Contact;
use Tests\TestCase;


/**
 * Feature tests for contact CRUD operations.
 *
 * Covers: index, create, update, and delete actions for authenticated users.
 */
class ContactCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if authenticated user can view contacts index.
     */
    public function test_authenticated_user_can_view_contacts_index(): void
    {
        $user = User::factory()->create();
        $contacts = Contact::factory()->count(3)->create();

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
        foreach ($contacts as $contact) {
            $response->assertSee($contact->name);
        }
    }

    /**
     * Test if authenticated user can create a contact.
     */
    public function test_authenticated_user_can_create_contact(): void
    {
        $user = User::factory()->create();
        $data = [
            'name' => 'Test User',
            'contact' => '123456789',
            'email' => 'testuser@example.com',
        ];
        $response = $this->actingAs($user)->post('/contacts', $data);
        $response->assertRedirect('/');
        $this->assertDatabaseHas('contacts', ['email' => 'testuser@example.com']);
    }

    /**
     * Test if authenticated user can update a contact.
     */
    public function test_authenticated_user_can_update_contact(): void
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create();
        $data = [
            'name' => 'Updated Name',
            'contact' => '987654321',
            'email' => 'updated@example.com',
        ];
        $response = $this->actingAs($user)->put('/contacts/' . $contact->id, $data);
        $response->assertRedirect('/contacts/' . $contact->id);
        $this->assertDatabaseHas('contacts', ['email' => 'updated@example.com']);
    }

    /**
     * Test if authenticated user can delete a contact (soft delete).
     */
    public function test_authenticated_user_can_delete_contact(): void
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create();
        $response = $this->actingAs($user)->delete('/contacts/' . $contact->id);
        $response->assertRedirect('/');
        $this->assertSoftDeleted('contacts', ['id' => $contact->id]);
    }
}

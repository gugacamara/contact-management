<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Contact;
use Tests\TestCase;

class ContactCrudTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

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

    public function test_authenticated_user_can_delete_contact(): void
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create();
        $response = $this->actingAs($user)->delete('/contacts/' . $contact->id);
        $response->assertRedirect('/');
        $this->assertSoftDeleted('contacts', ['id' => $contact->id]);
    }
}

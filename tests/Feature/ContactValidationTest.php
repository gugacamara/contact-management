<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Contact;
use Tests\TestCase;

class ContactValidationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_contact_validation_rules(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/contacts', [
            'name' => 'abc',
            'contact' => '123',
            'email' => 'invalid',
        ]);
        $response->assertSessionHasErrors(['name', 'contact', 'email']);
    }

    public function test_contact_email_and_contact_must_be_unique(): void
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create([
            'email' => 'unique@example.com',
            'contact' => '987654321',
        ]);
        $response = $this->actingAs($user)->post('/contacts', [
            'name' => 'Another User',
            'contact' => '987654321',
            'email' => 'unique@example.com',
        ]);
        $response->assertSessionHasErrors(['email', 'contact']);
    }
}

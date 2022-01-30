<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Client;

class ClientTest extends TestCase {
   use RefreshDatabase;

   public function test_user_can_create_client(){
       $client = $this->post('/clients', ['name' => 'manirabona patience', 'email' => 'hseal419@gmail.com']);
       $client->assertStatus(200);
   }

   // test user can read client
   public function test_user_can_see_client(){
       $client = Client::factory()->create();
       $this->assertTrue(Client::all()->count() == 1);

       $response = $this->get('/clients/'.$client->id);
       $response->assertStatus(200);
   }

   // test user can update client
   public function test_user_can_update_client(){
        $client = Client::factory()->create(['name' => 'Bracket']);
        $this->assertDatabaseHas('clients', ['name' => 'Bracket']);

        $response = $this->put('/clients/'.$client->id, ['name' => 'canvas']);
        $this->assertDatabaseHas('clients', ['name' => 'canvas']);
   }

   // test user can delete client
   public function test_user_can_delete_client(){
        $client = Client::factory()->create();
        $this->assertTrue(Client::all()->count() == 1);

        $response = $this->delete('/clients/'.$client->id);
        $response->assertStatus(200);
        $this->assertTrue(Client::all()->count() == 0);
   }
}

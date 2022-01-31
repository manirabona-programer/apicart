<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase {
    use RefreshDatabase;

    // test client can make order
    public function test_client_can_make_order(){
        $response = $this->post('/orders', ['client_id' => 1, 'product_id' => 1]);
        $response->assertStatus(200);
    }

    // test client can see order
    public function test_client_can_see_order(){
        $this->withoutExceptionHandling();
        $order = Order::factory()->create();
        $this->assertTrue(Order::all()->count() == 1);

        $response = $this->get('/orders/'.$order->id);
        $response->assertStatus(200);
    }

    // test client can delete order
    public function test_client_can_delete_order(){
        $this->withoutExceptionHandling();
        $order = Order::factory()->create();
        $this->assertTrue(Order::all()->count() == 1);

        $response = $this->delete('/orders/'.$order->id);
        $this->assertTrue(Order::all()->count() == 0);
    }
}

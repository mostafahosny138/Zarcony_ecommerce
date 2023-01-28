<?php

namespace Tests\Feature\Front;

use App\Services\CartService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckoutProcessTest extends TestCase
{

    public function test_do_checkout_without_address_and_paymrnt()
    {
        $this->actingAs($this->user)->post('/add-to-cart',['product_id'=>$this->product->id]);

     $responce= $this->actingAs($this->user)->post('/checkout');

        $responce->assertSessionHasErrors(['address','payment_method']);

    }

    public function test_do_checkout()
    {
        $this->actingAs($this->user)->post('/add-to-cart',['product_id'=>$this->product->id]);

        $response= $this->actingAs($this->user)->post('/checkout',['address'=>'address name','payment_method'=>'cod']);

        $response->assertSessionHasNoErrors();

        $this->assertTrue(true);
        $this->assertDatabaseHas('orders',['user_id'=>$this->user->id,'total'=>$this->product->price,'address'=>'address name']);

        $response->assertRedirectToRoute('order-done');

    }


    public function test_do_checkout_with_cart_total_zero()
    {
        $response= $this->actingAs($this->user)->post('/checkout',['address'=>'address name','payment_method'=>'cod']);
        $response->assertRedirectToRoute('index');
    }


}

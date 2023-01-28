<?php

namespace Tests\Unit\Front;

use App\Models\Product;
use App\Models\User;
use App\Services\CartService;
use Tests\TestCase;

class CartServiceTest extends TestCase
{

    public function setUp():void
    {
        parent::setUp();
        $this->cart_service = new CartService();
    }

    public function test_add_to_cart()
    {
        $this->cart_service->addToCart($this->user,$this->product->id);

        $this->assertTrue(true);
        $this->assertDatabaseHas('carts',
            [
                'user_id'=>$this->user->id,
                'product_id'=>$this->product->id,
                'quantity'=>1,
            ]);
    }

    public function test_delete_item_from_cart()
    {
        $cart=$this->cart_service->addToCart($this->user,$this->product->id);
        $this->cart_service->deleteCartItem($cart->id);

        $this->assertTrue(true);
        $this->assertDatabaseMissing('carts',
            [
                'user_id'=>$this->user->id,
                'product_id'=>$this->product->id,
                'quantity'=>1,
            ]);
    }




}

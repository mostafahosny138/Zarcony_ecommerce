<?php

namespace App\Services;


use App\Models\Brand;
use App\Models\Cart;
use App\Models\Order;

class CheckoutService
{

    public function checkout($data)
    {
        $order = $this->createOrderRecord($data);
        return $order;
    }


    private function prepareCartData($cartItems)
    {
        $preparedData =[];
        foreach ($cartItems as $cartItem){
            $preparedData[]=[
                'product_id' => $cartItem->product_id,
                'price' => $cartItem->product->price,
                'quantity' => $cartItem->quantity
            ];
        }
        return $preparedData;
    }

    private function createOrderRecord($data)
    {
        return Order::create([
            'user_id' => auth()->id(),
            'total' => $data['total'],
            'address' => $data['address'],
            'payment_method' => $data['payment_method'],
            'order_status_id' => 1
        ]);
    }

     function createOrderDetails($order,$cart_items)
    {
        $cart_items=$this->prepareCartData($cart_items);

        return $order->items()->createMany($cart_items);
    }




}

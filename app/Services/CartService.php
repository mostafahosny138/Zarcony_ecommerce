<?php

namespace App\Services;


use App\Models\Brand;
use App\Models\Cart;

class CartService
{

    public function addToCart($user,$product_id)
    {
        if ($cartItem = $this->checkIfExistInCart($product_id))
            return $this->updateCartItemQuantity($cartItem, ($cartItem->quantity + 1));

        $data['user_id'] = $user->id;
        $data['product_id'] = $product_id;
        $data['quantity'] = 1;
        return Cart::create($data);
    }

    private function checkIfExistInCart($item_id)
    {
        return Cart::where('product_id',$item_id)->first();
    }

    private function updateCartItemQuantity($item,$quantity)
    {
        return $item->update(['quantity' => $quantity]);
    }

    public function getCartItems()
    {
        return Cart::with(['product'])->where(['user_id' => auth()->id()])->get();
    }

    public function deleteCartItem($cartItemId)
    {
        return Cart::destroy($cartItemId);
    }

    public function getCartItemByItemId($id)
    {
        return Cart::where('product_id',$id)->first();
    }
    public function updateCartData($items)
    {
        foreach ($items as $item)
        {
            $this->updateCartItemQuantity($this->getCartItemByItemId($item['product_id']),$item['quantity']);
        }
        return true;
    }


    function getCartTotal($cartItems)
    {
       return $cartItems->map(function ($item, $key) {
            return $item->product->price * $item->quantity;
        })->sum();
    }

     function clearCartData($user_id)
    {
        return Cart::where('user_id',$user_id)->delete();
    }

}

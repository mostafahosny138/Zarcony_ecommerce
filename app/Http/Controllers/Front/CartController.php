<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function cart()
    {
        $items = $this->cartService->getCartItems();
        $total=$this->cartService->getCartTotal($items);
        return view('front.checkout.cart',compact('items','total'));
    }

    public function addToCart(Request $request)
    {
        $this->cartService->addToCart($request->user(),$request->product_id);
        return $this->setCode(200)->setMessage('product added successfully')->send();
    }


    public function deleteCartItem($cartItemId)
    {
        $this->cartService->deleteCartItem($cartItemId);
        $items = $this->cartService->getCartItems();
        $total=$this->cartService->getCartTotal($items);

        return $this->setCode(200)->setData(['total'=>$total])->send();
    }

}

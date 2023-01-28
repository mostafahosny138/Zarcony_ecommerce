<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use App\Services\OrderService;
use App\Services\CheckoutService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct(CartService $cartService, CheckoutService $checkoutService)
    {
        $this->cartService = $cartService;
        $this->checkoutService = $checkoutService;
    }

    public function checkout()
    {
        $items = $this->cartService->getCartItems();
        $total=$this->cartService->getCartTotal($items);
        if ( $total<=0)
            return redirect()->route('index');

        return view('front.checkout.checkout',compact('items','total'));
    }


    public function doCheckout(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required',
            'payment_method' => 'required'
        ]);

        $items = $this->cartService->getCartItems();
        $validated['total'] = $this->cartService->getCartTotal($items);

        if($validated['total'] <= 0)
            return redirect()->route('index');

        $order= $this->checkoutService->checkout($validated);
        $this->checkoutService->createOrderDetails($order,$items);
        $this->cartService->clearCartData(auth()->id());

        return redirect('/order-done');

    }

    function orderCompleted()
    {
        return view('front.checkout.done');

    }

}

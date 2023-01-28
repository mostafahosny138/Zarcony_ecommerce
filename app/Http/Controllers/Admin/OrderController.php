<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\OrderDetailResource;
use App\Http\Resources\Admin\OrderResource;
use App\Models\Order;
use App\Services\Admin\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(OrderService $orderService)
    {
        $this->orderService=$orderService;
    }

    function getOrders(Request $request)
    {
        $orders=$this->orderService->getOrders($request->all());
        return response()->json(OrderResource::collection($orders)->response()->getData(true));
    }

    function findOrder($id)
    {
        $order=Order::with(['items','items.product'])->findOrfail($id);
        return response()->json(OrderResource::make($order)->additional($order->toArray()));
    }

    function changeOrderStatus(Request $request,$id)
    {
        $order=Order::findOrfail($id);
        $order->update(['order_status_id'=>$request->status_id]);
        return response()->json(OrderResource::make($order)->additional($order->toArray()));
    }


}

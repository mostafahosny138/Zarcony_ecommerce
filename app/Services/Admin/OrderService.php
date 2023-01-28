<?php

namespace App\Services\Admin;


use App\Models\Brand;
use App\Models\Cart;
use App\Models\Order;

class OrderService
{

    function getOrders($data=[])
    {
       $orders= Order::query();
        $orders->where(function ($query) use ($data){
            if (isset($data['status_id']))
                $query->where('order_status_id',$data['status_id']);
        });

       return $orders->select('id','total','user_id','order_status_id','address','created_at')
           ->orderByDesc('id')->simplePaginate(50);
    }
}

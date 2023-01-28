<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
        [
            'product_id'=>$this->product_id,
            'product_name'=>$this->product->title,
            'quantity'=>$this->quantity,
            'price'=>$this->price,
            'total_price'=>$this->price * $this->quantity,
        ];
    }
}

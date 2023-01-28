<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'id'=>$this->id,
            'user_name'=>$this->user->id,
            'total'=>$this->total,
            'address'=>$this->address,
            'current_status'=>$this->status->name,
            'created_at'=>$this->created_at,


        ];
    }

    function additional(array $data)
    {
        return ['id'=>$this->id,
            'user_name'=>$this->user->id,
            'total'=>$this->total,
            'address'=>$this->address,
            'current_status'=>$this->status->name,
            'created_at'=>$this->created_at,
            'products'=>OrderDetailResource::collection($this->items)];
    }
}

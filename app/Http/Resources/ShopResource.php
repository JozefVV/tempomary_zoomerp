<?php

namespace App\Http\Resources;

use App\Http\Resources\AddressResource;
use App\Http\Resources\WarehouseResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $whatIsThis = parent::toArray($request);
        // // dd($whatIsThis);
        // var_dump($whatIsThis);
        // die();
        // return $whatIsThis;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'contact' => $this->email,
            'warehouse' => new WarehouseResource($this->warehouse),
            'address' => new AddressResource($this->address),
        ];
    }
}

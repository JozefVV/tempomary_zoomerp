<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'streetName' => $this->street_name,
            'streetNumber' => $this->street_number,
            'postCode' => $this->post_code,
            'city' => $this->city,
            'country' => $this->country,
            'gps' => [
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
            ],
            'formated' => $this->street_name.' '.$this->street_number.' '.$this->post_code.' '.$this->city,
        ];
    }
}

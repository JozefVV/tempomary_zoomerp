<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeInstanceResource extends JsonResource
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
          'id' => $this->id,
          'value' => $this->value,
          'name' => $this->attributeType->name,
          'prefix' => $this->attributeType->prefix,
          'sufix' => $this->attributeType->sufix,
          'type' => $this->attributeType->type,
        ];
    }
}

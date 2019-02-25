<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AtributeValue extends JsonResource
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
          'name' => $this->atribute->name,
          'prefix' => $this->atribute->prefix,
          'sufix' => $this->atribute->sufix,
          'type' => $this->atribute->type,
        ];
    }
}

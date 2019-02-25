<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeType extends Model
{
    public function AttributeInstance()
    {
        return $this->hasMany('App\Models\AttributeInstance');
    }
}

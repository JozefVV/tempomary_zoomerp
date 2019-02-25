<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeType extends Model
{
    public function values()
    {
        return $this->hasMany('App\Models\AttributeInstance');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeInstance extends Model
{
    public function attribute()
    {
        return $this->belongsTo('App\Models\AttributeType');
    }
}

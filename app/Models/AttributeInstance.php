<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeInstance extends Model
{
    // protected $with = ['AttributeType'];
    // protected $table = AttributeType;

    public function attributeType()
    {
        return $this->belongsTo('App\Models\AttributeType');
    }
}

<?php

namespace App\Models;

use App\Models\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $guarded = ['id'];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function shop()
    {
        return $this->hasOne(Shop::class);
    }
}

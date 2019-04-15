<?php

namespace App\Models;

use App\Models\Address;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    protected $guarded = ['id'];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}

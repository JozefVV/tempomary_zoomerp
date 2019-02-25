<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Filters\Product\ProductFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Item extends Model
{
    public function scopeFilter(Builder $builder, Request $request, array $filters = [])
    {
        return ( new ProductFilters(request()) )->add($filters)->filter($builder);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
    public function atributeInstances()
    {
        return $this->belongsToMany('App\Models\AttributeInstance');
    }
}

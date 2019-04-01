<?php

namespace App\Filters\Item;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class EndsWithFilter extends FilterAbstract
{
    /**
     * Mappings for database values.
     *
     * @return array
     */
    public function mappings()
    {
        return [

        ];
    }

    /**
     * Filter by course type.
     *
     * @param  string $type
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function filter(Builder $builder, $value)
    {
        $value = $this->resolveFilterValue($value);

        if ($value === null) {
            return $builder;
        }

        return $builder->where('type', $value);
    }
}

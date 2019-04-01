<?php

namespace App\Filters\Item;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class GreaterThanFilter extends FilterAbstract
{
    /**
     * Mappings for database values.
     *
     * @return array
     */
    public function mappings()
    {
        return [
            // 'theory' => 'theory',
            // 'project' => 'project',
            // 'snippet' => 'snippet',
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
        $argArray = splitValueToMultiple($value);
        $atributeName = $argArray[0];
        $filterValue = $argArray[1];

        return $builder->where($atributeName, '>', $filterValue);
    }
}

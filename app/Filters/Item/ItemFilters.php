<?php

namespace App\Filters\Item;

use App\Filters\FiltersAbstract;
use App\Models\Item;

use App\Filters\Item\LessThanFilter;
use App\Filters\Item\GreaterThanFilter;

class ItemFilters extends FiltersAbstract
{
    /**
     * Default course filters.
     *
     * @var array
     */
    protected $filters = [
        'lt' => LessThanFilter::class,
        'gt' => GreaterThanFilter::class,
        'eq' => EqualFilter::class,
        'contains' => ContainsFilter::class,
        'sw' => StartsWithFilter::class,
        'ew' => EndsWithFilter::class,
    ];

    public static function mappings()
    {
        // $map = [
        //     'access' => [
        //         'free' => 'Free',
        //         'premium' => 'Premium',
        //     ],
        //     'difficulty' => [
        //         'beginner' => 'Beginner',
        //         'intermediate' => 'Intermediate',
        //         'advanced' => 'Advanced',
        //     ],
        //     'type' => [
        //         'snippet' => 'Snippet',
        //         'project' => 'Project',
        //         'theory' => 'Theory',
        //     ],
        //     'subjects' => Subject::get()->pluck('name', 'slug')->toArray()
        // ];

        // if (auth()->check()) {
        //     $map = array_merge($map, [
        //         'started' => [
        //             'true' => 'Started',
        //             'false' => 'Not started',
        //         ]
        //     ]);
        // }

        return $map;
    }
}

<?php

namespace App\Filters\Product;

use App\Filters\FiltersAbstract;
use App\Models\Product;

use App\Filters\Product\{
    TextFilter
};

class ProductFilters extends FiltersAbstract
{
    /**
     * Default course filters.
     *
     * @var array
     */
    protected $filters = [
        // 'text' => TextFilter::class,
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

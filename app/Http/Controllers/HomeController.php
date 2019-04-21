<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Shop;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'featured_panels' => [
                'shops' =>  [
                    'count' => Shop::count(),
                    'link' => route('shop.index'),
                ],
                'warehouses' =>  [
                    'count' => Warehouse::count(),
                    'link' => route('warehouse.index'),
                ],
                'users' =>  [
                    'count' => User::count(),
                    'new' => User::new()->count(),
                    'link' => route('userAdministration.list'),
                ],
                'items' =>  [
                    'count' => Item::count(),
                    'link' => '#',
                ],
            ]
        ];
        return view('dashboard', $data);
    }

    public function soon()
    {
        return "this page is under construction and will be implemented soon";
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Http\Resources\ShopResource;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::with(['address','warehouse'])->get();

        // return response()->json($shops);
        return view('pages.shops.index', ['shops'=>$shops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "TODO";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create address of shop
        $address = Address::create([$request->address]);
        if ($address == null) {
            // Log::debug('An informational message.');
            abort(400, 'Address not found but it is required');
        }
        //if said so, create warehouse asigned to shop
        $warehouse = Warehouse::create([
            'name' => $request->name,
            'address_id' => $address->id,
        ]);

        //create the shop
        $shop = Shop::create([$request]);

        return new ShopResource($shop);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        return new ShopResource($shop);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        return view('pages.shops.edit', ['shop'=>$shop]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        $shop->update($request->only(['name','email','phone']));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();

        // return response()->json(null, 204);
        return back();
    }
}

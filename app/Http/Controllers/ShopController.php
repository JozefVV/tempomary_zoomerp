<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Address;
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
        return view('pages.shops.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create the shop
        $shop = Shop::create($request->except('address'));

        // create address of shop
        $address = Address::create($request->address);
        $shop->address()->associate($address);
        
        //if said so, create warehouse asigned to shop
        $warehouse = Warehouse::create([
            'name' => $request->name,
            'address_id' => $address->id,
        ]);
        $shop->warehouse()->associate($warehouse);
        
        $shop->save();
        
        return redirect()->route('shop.index');
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

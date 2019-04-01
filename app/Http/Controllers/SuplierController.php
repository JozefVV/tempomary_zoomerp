<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;
use App\Http\Resources\SuplierResource;

class SuplierController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return SuplierResource::collection(Suplier::with(['delivery_addresses','billing_addresses'])->paginate(25));
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
        //create delivery address
        $delivery_address = Address::create([$request->delivery_address]);
        if ($delivery_address == null) {
            abort(400, 'Address not found but it is required');
        }

        //if there is no billing address asume its the same as delivery
        if ($request->has('billing_address')) {
            $billing_address_id = Address::create([$request->billing_address])->id;
        } else {
            $billing_address_id = $delivery_address->id;
        }

        $request->request->add(['delivery_address' => $delivery_address->id]);
        $request->request->add(['billing_address' => $billing_address_id]);

        $suplier = Suplier::create([$request]);

        return new SuplierResource($suplier);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Suplier $suplier)
    {
        return new SuplierResource($suplier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Suplier $suplier)
    {
        //TODO
        return "TODO";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suplier $suplier)
    {
        $suplier->update($request);

        return new SuplierResource($suplier);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suplier $suplier)
    {
        $suplier->delete();

        return response()->json(null, 204);
    }
}

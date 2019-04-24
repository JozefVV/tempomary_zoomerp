<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Value;
use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ItemCollection;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $items = Item::with(['categories'])->filter($request)->get();
        $items = Item::filter($request)->get();
        return view('pages.items.index', ['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        $attributes = Attribute::all();

        $oldFormValues = $request->session()->get('itemCreationSavedForm');

        return view('pages.items.new', [
            'categories'=>$categories,
            'attributes'=>$attributes,
            'attribute_templates' => [],
            'oldValues' => $oldFormValues,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //handle tempomary redirect to create new related resource
        //save partially filled form
        if ($request->redirect['active']) {
            session(['itemCreationSavedForm' => $request->except('_token')]);
            return $this->redirectToCreateRelatedResource($request);
        }
        //delete old data from session
        $request->session()->forget('itemCreationSavedForm');

        $newItem = Item::create([
            'name' => $request->name,
        ]);

        for ($i = 0 ; $i < count($request->attributeValue['id']) ; $i++) {
            Value::create([
                'attribute_id' => $request->attributeValue['id'][$i],
                'item_id' => $newItem->id,
                'value_text' => $request->attributeValue['value'][$i],
            ]);
        }

        return redirect()->route('item.index')->with('success', 'Item created successfully');
    }

    protected function redirectToCreateRelatedResource(Request $request)
    {
        if (!Route::has($request->redirect['to'])) {
            Log::error("Submited named path not found");
            return back()->with("error", "Submited named path not found, redirected back");
        }
        return redirect()->route('category.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return new ItemResource($item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
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
    public function update(Request $request, Item $item)
    {
        $item->update($request->all());

        return new ItemResource($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = null;
        $categories = Category::all();

        //絞り込み機能
        if($request->name !== null) {
            $name = $request->name;
        }

        //部分一致で抽出されるようにする
        $stores = Store::where('name', 'like', "%{$name}%");

        if($request->category_id !== null) {
            $stores = $stores->whereHas('category', function ($query) use ($request) {
                $query->where('categories.id', $request->category_id);
            });
        }

        //絞り込まれたものを表示
        $total_count = $stores->count();
        $stores = $stores->sortable()->paginate(5);


        return view('stores.index', compact('stores','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        $reviews = $store->reviews()->get();
  
        return view('stores.show', compact('store', 'reviews'));
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }

    public function favorite(Store $store)
    {
        Auth::user()->togglefavorite($store);

        return back();
    }

    public function reservation($store)
    {    
        $store = Store::find($store);

        return view('stores.reservation',compact('store'));
    }

    public function review($store)
    {    
        $store = Store::find($store);

        return view('stores.review',compact('store'));
    }

}

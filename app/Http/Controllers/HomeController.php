<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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


        return view('welcome', compact('stores','categories'));
    }
}

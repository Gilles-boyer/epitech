<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;
use App\location;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = product::orderBy('created_at', 'desc')->paginate(4) ;
        $category = category::get();
        $location = location::get();

        return view('home')->with('products',$products)
                            ->with('location', $location)
                            ->with('category',$category);
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $search = product::where('title', 'like' , "%$search%")
                        ->orWhere('description', 'like' , "%$search%")
                        ->paginate(4);

        return view('search')->with('products', $search);
    }
    public function filtercat( $id)
    {
        $search = product::where('category_id', $id)
                        ->paginate(4);

        return view('search')->with('products', $search);
    }
    public function filterloc( $id)
    {
        $search = product::where('location_id', $id)
                        ->paginate(4);

        return view('search')->with('products', $search);
    }
}

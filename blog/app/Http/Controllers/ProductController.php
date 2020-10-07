<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use App\category;
use App\location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::get();
        $location = location::get();

        return view('ads')->with('category', $category)->with('location', $location);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userads()
    {
        $product = product::where('user_id', Auth::user()->id)->get();
        return view('userads')->with('product', $product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:2|max:50',
            'category' => 'required|integer',
            'description' => 'required|string|min:10|max:150',
            'condition' => 'required|string|min:2|max:10',
            'location' => 'required|integer',
            'price' => 'required|integer',
            'image' => 'required|image|',
        ]);
        if ($validator->fails()) {
            return redirect('ads')
                        ->withErrors($validator)
                        ->withInput();
        } else {

            $file = $request->file('image')->getClientOriginalName();

            $request->file('image')->storeAs('image',$file, 'public');
            $product = new Product;

            $product->title = $request->title;
            $product->category_id = $request->category;
            $product->user_id = Auth::user()->id;
            $product->description = $request->description;
            $product->condition = $request->condition;
            $product->location_id = $request->location;
            $product->price = $request->price;
            $product->image = $file;

            $product->save();

            return redirect('ads')->with('status', 'Product is created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $product = product::where('id', $id)->firstorfail();
       return view('show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::where('id', $id)->firstorfail();

        $category = category::get();
        $location = location::get();

        return view('modifyAds')->with('category', $category)
            ->with('location', $location)
            ->with('product', $product)
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:2|max:50',
            'category' => 'required|integer',
            'description' => 'required|string|min:10|max:150',
            'condition' => 'required|string|min:2|max:10',
            'location' => 'required|integer',
            'price' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return redirect('ads')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $product = new Product;
            $id = $request->modify;
            $product = Product::find($id);
            if(empty($request->file('image')))
            {
                $product->title = $request->title;
                $product->category_id = $request->category;
                $product->description = $request->description;
                $product->condition = $request->condition;
                $product->location_id = $request->location;
                $product->price = $request->price;
            } else {
                $product->title = $request->title;
                $product->category_id = $request->category;
                $product->description = $request->description;
                $product->condition = $request->condition;
                $product->location_id = $request->location;
                $product->price = $request->price;
                $file = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('image',$file, 'public');
                $product->image = $file;
            }
            $product->save();

            return redirect('userads')->with('status', 'Product is modified');
        }
    }


    public function deleteOrUpdate(request $request)
    {
        $id= $request->ads;
        if($request->delete =='delete'){

            $prod = product::find($id);

            $prod->delete();

            return redirect('userads')->with('status', 'ad deleted');
       } else {

            return redirect("modifyads/$id");
       }
    }
}

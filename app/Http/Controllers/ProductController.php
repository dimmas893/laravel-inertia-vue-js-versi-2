<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts from database
        $products = Product::latest()->get();

        //render with data "products"
        return Inertia::render('Product/Index', compact('products'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $post = Post::all();
        return Inertia::render('Product/Create', compact('post'));
    }

    public function store(Request $request)
    {
        //set validation
        $request->validate([
            'diamond'   => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ]);

        //create post
        $post = Product::create([
            'diamond'     => $request->diamond,
            'price'   => $request->price,
            'category_id'   => $request->category_id
        ]);

        if ($post) {
            return Redirect::route('products');
        }
    }


    public function edit(Request $request)
    {

        $product = Product::where('id', $request->id)->first();
        return Inertia::render('Product/Edit', compact('product'));
    }


    public function update(Request $request)
    {
        //set validation

        $product = Product::where('id', $request->id)->first();
        $request->validate([
            'diamond'   => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ]);

        //update post
        $product->update([
            'diamond'     => $request->diamond,
            'price'   => $request->price,
            'category_id'   => $request->category_id
        ]);

        if ($product) {
            return Redirect::route('products');
        }
    }

    public function destroy($id)
    {
        //find post by ID
        $product = Product::findOrfail($id);

        //delete post
        $product->delete();

        if ($product) {
            return Redirect::route('products');
        }
    }
}

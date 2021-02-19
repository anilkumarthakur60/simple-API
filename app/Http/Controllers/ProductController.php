<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\ProductResource;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return  Product::all();
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Product $product)
    {
        return  new ProductResource($product);
        //
    }



    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}

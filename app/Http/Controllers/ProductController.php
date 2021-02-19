<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Model\Product;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api')->except('index','show');
    }

    public function index()
    {
        return  ProductCollection::collection(Product::paginate(5));
        //
    }


    public function store(StoreProductRequest $request)
    {
        $product= new Product();
        $product->name=$request->name;
        $product->detail=$request->description;
        $product->discount=$request->discount;
        $product->stock=$request->stock;
        $product->price=$request->price;
            $product->save();
            return response(['data'=>new ProductResource($product)],201);
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

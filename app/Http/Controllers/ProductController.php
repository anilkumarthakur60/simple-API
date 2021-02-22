<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Model\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

use App\Exceptions\ProductNotBelongsToUser;
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
        $product->user_id=Auth::id();
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



    public function update(StoreProductRequest $request, Product $product)
    {
        $this->ProductUserCheck($product);

        $product->name=$request->name;
        $product->detail=$request->description;
        $product->price=$request->price;
        $product->stock=$request->stock;
        $product->discount=$request->discount;
        $product->update();
        return response([
            'data'=>new ProductResource($product)
        ],Response::HTTP_CREATED);
        //
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return  response(null,Response::HTTP_NO_CONTENT);
        //

    }

     public function ProductUserCheck($product){
        if(Auth::id()!==$product->user_id){
            throw new ProductNotBelongsToUser;
        }
     }


}

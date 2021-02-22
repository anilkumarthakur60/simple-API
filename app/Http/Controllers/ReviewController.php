<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\ReviewRequest;
use App\Http\Resources\Review\ReviewResource;
use App\Model\Product;
use App\Model\Review;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReviewController extends Controller
{

    public function index(Product $product)
    {
        return ReviewResource::collection($product->reviews);
        //
    }


    public function create()
    {
        //
    }


    public function store(ReviewRequest $request ,Product $product)
    {
        $review=new Review($request->all());

         $product->reviews()->save($review);

        return response([
            'data'=>new ReviewResource($review)
        ],Response::HTTP_CREATED);
        //
    }

    public function show(Review $review)
    {
        //
    }


    public function edit(Review $review)
    {
        //
    }


    public function update(Request $request, Review $review)
    {
        //
    }


    public function destroy(Review $review)
    {
        //
    }
}

<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends ProductResource
{

    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'totalPrice'=>number_format($this->price*(1-$this->discount/100),2),
            'rating'=>  $this->reviews->count()>0 ? round($this->reviews->sum('star')/$this->reviews->count()):'No rating yet',
            'discount'=>$this->discount.'%',
            'href'=>[
                'link'=>route('products.show',$this->id)
            ]
        ];
    }
}

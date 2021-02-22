<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'name','detail','price','discount','stock','user_id'
    ];

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    //
}

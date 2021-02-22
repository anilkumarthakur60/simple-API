<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongsToUser extends Exception
{
    public function render(){
        return ['data'=>'product not belongs to user'];
    }
    //
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
class WelcomeController extends Controller
{
    public function showalert(){
        alert()->info('Title','Lorem Lorem Lorem');

        return view('welcome');

    }
    //
}

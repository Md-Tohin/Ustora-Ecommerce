<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //  order store
    public function orderStore(Request $request){
        return $request->all();
    }
}

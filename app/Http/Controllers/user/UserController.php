<?php

namespace App\Http\Controllers\user;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //  orders
    public function orders(){
        $top_categories = Category::where('is_top', 1)->orderBy('id', 'asc')->get();
        return view('frontend.user.order.orders', compact('top_categories'));
    }
}

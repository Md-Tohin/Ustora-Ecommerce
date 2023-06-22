<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    function imageProcessing($req){
        $image = $req->file('image');
        $imageName = rand(10000000, 999999999);
        $img_ex = $image->getClientOriginalExtension();
        $img_name = $imageName.'.'.$img_ex;
        $directory = "assets/upload/product_images/";
        $image->move($directory, $img_name);
        return $directory.$img_name;
    }

    function createProduct($data){
        $product = new Product();
        $product->name = $data->name;
        $product->price = $data->price;
        $product->quantity = $data->quantity;
        $product->category_id = $data->category_id;
        $product->short_description = $data->short_description;
        $product->long_description = $data->long_description;
        $product->image = $product->imageProcessing($data);
        $product->save();
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    function imageProcessing($req){
        $image = $req->file('image');
        $imageName = $image->getClientOriginalName();
        // $imageEx = $image->getClientOriginalExtension();
        $directory = "assets/upload/category_images/";
        $image->move($directory, $imageName);
        return $directory.$imageName;
    }

    function createCategory($data){
        $categories = new Category();
        $categories->name = $data->name;
        $categories->description = $data->description;
        $categories->is_top = $data->is_top;
        $categories->image =  $categories->imageProcessing($data);
        $categories->save();
    }

}

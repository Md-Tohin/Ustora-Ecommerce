<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    function imageProcessing($req){
        $image = $req->file('image');
        $imageName = $image->getClientOriginalName();
        // $imageEx = $image->getClientOriginalExtension();
        $directory = "assets/upload/slider_images/";
        $image->move($directory, $imageName);
        return $directory.$imageName;
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieImageController extends Controller
{
    public function show($image)
    { $file = public_path()."/storage/movies_cover/".$image;        
        if (file_exists($file)) {
            return \Response::download($file,$image);
        } else {
            return ["error"=>"error image not found"];
        }
    }
}

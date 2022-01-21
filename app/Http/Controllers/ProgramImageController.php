<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramImageController extends Controller
{
    public function show($image)
    { $file = public_path()."/storage/programs_cover/".$image;        
        if (file_exists($file)) {
            return \Response::download($file,$image);
        } else {
            return ["error"=>"الصوره غير موجوده"];
        }
    }
}

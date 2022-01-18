<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;

use App\Http\Resources\MovieResource;
use App\Http\Requests\MovieRequest;


class MovieController extends Controller
{
    public function index()
    {
        $movies=MovieResource::collection(
            Movie::paginate(12)
        );
        if($movies->isEmpty())
            return ["error"=>"no movies found"];
        return $movies;
    }

    public function indexAll()
    {
        $movies=MovieResource::collection(
            Movie::all()
        );
        if($movies->isEmpty())
            return ["error"=>"no movies found"];
        return $movies;
    }

    public function show($movie)
    {
        $movie =  Movie::find($movie);

        if($movie)
            return new MovieResource($movie);

        return ["error"=>"movie not found"];
    }

    public function store(MovieRequest $request){       
        $movie=$request->only(['title',
        'category',
        'video_url',
        'production_year',
        'director',
        'subtitle_language',
        'Original_language',
        'duration',
        'evaluation',
        'long_description']);

        if($request -> hasFile('image')){
           
            $compeleteFileName = $request->file('image')->getClientOriginalName();
            $fileNameOnly = pathinfo($compeleteFileName,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $compPic = str_replace(' ','_',$fileNameOnly).'-'.rand().'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/movies_cover',$compPic);
            $movie["image"] = $compPic;
            
        }
        $newMovie = Movie::create($movie);

        if($newMovie) 
            return ["data"=>"success"];
        return ["error"=>"couldn't create movie"];
    }

    public function update(MovieRequest $request,$id)
	{
        $movie =  Movie::find($id);
        $updatedMovie=$request->only(['title',
        'category',
        'video_url',
        'production_year',
        'director',
        'subtitle_language',
        'Original_language',
        'duration',
        'evaluation',
        'long_description']);

        if($request -> hasFile('image')){
            $file = public_path()."/storage/movies_cover/".$movie->image;
            if (file_exists($file)) {
                \File::delete($file);
            }
            $compeleteFileName = $request->file('image')->getClientOriginalName();
            $fileNameOnly = pathinfo($compeleteFileName,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $compPic = str_replace(' ','_',$fileNameOnly).'-'.rand().'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/movies_cover',$compPic);
            $updatedMovie["image"] = $compPic;
            
        }
       
        $newMovie=$movie->update($updatedMovie);
        if($newMovie) 
          return $movie;
        return ["error"=>"couldn't Update movie"];

	}

    public function destroy($id)
	{ $movie =  Movie::find($id);
      $file = public_path()."/storage/movies_cover/".$movie->image;        
      $delted = Movie::destroy($id);
      if($delted==1) {
        if (file_exists($file)) {
            \File::delete($file);
        }
        return ["data"=>"success"];}
      return ["error"=>"couldn't delete movie"];
	}

    public function search($title)
	{
        $movies=MovieResource::collection(
            Movie::where('title','like','%'.$title.'%')->get()
        );
        if($movies->isEmpty())
            return ["error"=>"no movies found"];
        return $movies;
    }

    public function getPageNumbers()
    {
        $movies_count= Movie::all()->count();
        if($movies_count==0)
            return ["error"=>0];
        return (ceil($movies_count/ 12));
    }

}

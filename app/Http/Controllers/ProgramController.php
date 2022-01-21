<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProgramRequest;
use App\Models\Program;
use App\Http\Resources\ProgramResource;

class ProgramController extends Controller
{
    public function index()
    {
        $programs=ProgramResource::collection(
            Program::paginate(12)
        );
        if($programs->isEmpty())
            return ["error"=>"no programs found"];
        return $programs;
    }

    public function indexAll()
    {
        $programs=ProgramResource::collection(
            Program::all()
        );
        if($programs->isEmpty())
            return ["error"=>"no programs found"];
        return $programs;
    }


    public function show($program)
    {
        $program =  Program::find($program);

        if($program)
            return new ProgramResource($program);

        return ["error"=>"program not found"];
    }

    public function store(ProgramRequest $request){
        $program=$request->only(['title',
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
            $path = $request->file('image')->storeAs('public/programs_cover',$compPic);
            $program["image"] = $compPic;
            
        }
        $newProgram = Program::create($program);

        if($newProgram) 
            return ["data"=>"success"];
        return ["error"=>"couldn't create Program"];
    }

    public function update(ProgramRequest $request,$id)
	{
        $program =  Program::find($id);
        $updatedProgram=$request->only(['title',
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
            $file = public_path()."/storage/programs_cover/".$program->image;
            if (file_exists($file)) {
                \File::delete($file);
            }
            $compeleteFileName = $request->file('image')->getClientOriginalName();
            $fileNameOnly = pathinfo($compeleteFileName,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $compPic = str_replace(' ','_',$fileNameOnly).'-'.rand().'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/programs_cover',$compPic);
            $updatedProgram["image"] = $compPic;
            
        }
       
        $newProgram=$program->update($updatedProgram);
        if($newProgram) 
          return $program;
        return ["error"=>"couldn't Update program"];

	}

    public function destroy($id)
	{ $program =  Program::find($id);
      $file = public_path()."/storage/programs_cover/".$program->image;        
      $delted = Program::destroy($id);
      if($delted==1) {
        if (file_exists($file)) {
            \File::delete($file);
        }
        return ["data"=>"success"];}
      return ["error"=>"couldn't delete program"];
	}

    public function search($title)
	{
        $programs=ProgramResource::collection(
            Program::where('title','like','%'.$title.'%')->get()
        );
        if($programs->isEmpty())
            return ["error"=>"no programs found"];
        return $programs;
    }

    public function getPageNumbers()
    {
        $programs_count= Program::all()->count();
        if($programs_count==0)
            return ["error"=>0];
        else 
        return (ceil($programs_count/ 12));
        }
}

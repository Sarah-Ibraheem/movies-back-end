<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'title'  => 'required',
        'category'  =>  'required',
        'video_url'  => 'required',
        'production_year'  => 'required',
        'director'  => 'required ',
        'subtitle_language'  =>'required ',
        'Original_language'  => 'required ',
        // 'image'  => 'image|mimes:png,jpg,jpeg',
        'duration'  =>'required ',
        'evaluation'  => 'required |numeric',
        'long_description'  => 'required ',
        ];
    }
}

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
        'image'  => 'image',
        'duration'  =>'required ',
        'evaluation'  => 'required |numeric',
        'long_description'  => 'required ',
        ];
    }

    public function messages()
    {
        return [
            "title.required"       => "يجب ادخال اسم الفيلم",
            "category.required"       => "يجب ادخال نوع الفيلمم",
            "video_url.required"       => "يجب ادخال رابط فيديو الفيلم",
            "production_year.required"       => "يجب ادخال سنة انتاج الفيلم",
            "director.required"       => "يجب ادخال مخرج الفيلم",
            "subtitle_language.required"       => "يجب ادخال اللغة الاصليه للفيلم",
            "Original_language.required"       => "يجب ادخال لغة ترجمة الفيلم",
            "duration.required"       => "يجب ادخال المده الزمنيه للفيلم",
            "evaluation.required"       => "يجب ادخال تقييم الفيلم",
            "long_description.required"       => "يجب ادخال وصف الفيلم",
            "evaluation.numeric"       => "التقييم يجب ان يكون رقم",
            "image.image"       => "تأكد من ان الملف المحمل صوره",
        ];
    }
}

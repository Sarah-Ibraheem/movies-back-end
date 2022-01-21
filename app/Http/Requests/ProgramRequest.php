<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
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
            "title.required"       => "يجب ادخال اسم البرنامج",
            "category.required"       => "يجب ادخال نوع البرنامج",
            "video_url.required"       => "يجب ادخال رابط فيديو البرنامج",
            "production_year.required"       => "يجب ادخال سنة انتاج البرنامج",
            "director.required"       => "يجب ادخال مخرج البرنامج",
            "subtitle_language.required"       => "يجب ادخال اللغة الاصليه للبرنامج",
            "Original_language.required"       => "يجب ادخال لغة ترجمة البرنامج",
            "duration.required"       => "يجب ادخال المده الزمنيه للبرنامج",
            "evaluation.required"       => "يجب ادخال تقييم البرنامج",
            "long_description.required"       => "يجب ادخال وصف البرنامج",
            "evaluation.numeric"       => "التقييم يجب ان يكون رقم",
            "image.image"       => "تأكد من ان الملف المحمل صوره",
        ];
    }
}

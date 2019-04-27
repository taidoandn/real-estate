<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch (request()->method()) {
            case 'PUT':
            case 'PATCH':
                $rules = [
                    'title'   => ['required','min:10','max:191','unique:blogs,title,'.$this->blog],
                    'content' => ['required','min:40'],
                    'author'  => ['required'],
                    'fImage'  => ['image','mimes:jpg,jpeg,bmp,png','max:2048'],
                ];
                break;

            default:
                $rules = [
                    'title'   => ['required','min:10','max:191','unique:blogs,title'],
                    'content' => ['required','min:40'],
                    'author'  => ['required'],
                    'fImage'  => ['image','mimes:jpg,jpeg,bmp,png','max:2048'],
                ];
                break;
        }
        return $rules;
    }
}

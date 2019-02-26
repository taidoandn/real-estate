<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
        return [
            'purpose'         => 'required',
            'title'           => 'required|max:255|unique:posts,title',
            'price'           => 'required|numeric',
            'area'            => 'required|numeric',
            'description'     => 'required|min:100',
            'district_id'     => 'required',
            'city'            => 'required',
            'address'         => 'required',
            'latitude'        => 'required',
            'longitude'       => 'required',
            'fImage'          => 'required|image|mimes:jpg,jpeg,bmp,png|max:2048',
            'fImageDetails.*' => 'image|max:2048',
            'type_id'         => 'required|exists:property_types,id',
        ];
    }
}

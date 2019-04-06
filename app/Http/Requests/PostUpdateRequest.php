<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'title'       => 'required|max:255|unique:posts,title,'.$this->post,
            'purpose'     => 'required',
            'price'       => 'required|numeric',
            'area'        => 'required|numeric',
            'description' => 'required|min:100',
            'district_id' => 'required',
            'city_id'     => 'required|exists:cities,id',
            'address'     => 'required',
            'latitude'    => 'required',
            'longitude'   => 'required',
            'fImage'      => 'image|mimes:jpg,jpeg,bmp,png|max:2048',
            'type_id'     => 'required|exists:property_types,id',
            'floor'       => 'required',
            'bed_room'    => 'required',
            'bath'        => 'required',
            'balcony'     => 'required',
            'toilet'      => 'required',
        ];
    }
}

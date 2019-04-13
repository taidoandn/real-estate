<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $today = Carbon::now();
        $start = Carbon::parse(request()->start_date) ?? null;
        $end   = Carbon::parse(request()->end_date) ?? null;;
        $diff  = $start->diffInDays($end);
        switch (request()->method()) {
            case 'PATCH':
            case 'PUT':
                $rules = [
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
                    'property_id' => 'required|exists:property_types,id',
                    'floor'       => 'required',
                    'bed_room'    => 'required',
                    'bath'        => 'required',
                    'balcony'     => 'required',
                    'toilet'      => 'required',
                    'start_date'  => 'required|date|date_format:Y-m-d|after'.$today.'|before:end_date',
                    'end_date'    => 'required|date|date_format:Y-m-d|after:'.$start->addDays($diff - 1),
                ];
                break;
            default:
                $rules = [
                    'title'           => 'required|max:255|unique:posts,title',
                    'purpose'         => 'required',
                    'price'           => 'required|numeric',
                    'area'            => 'required|numeric',
                    'description'     => 'required|min:100',
                    'district_id'     => 'required',
                    'city_id'         => 'required|exists:cities,id',
                    'address'         => 'required',
                    'latitude'        => 'required',
                    'longitude'       => 'required',
                    'fImage'          => 'required|mimes:jpg,jpeg,bmp,png|max:2048',
                    'fImageDetails.*' => 'mimes:jpg,jpeg,bmp,png|max:2048',
                    'property_id'     => 'required|exists:property_types,id',
                    'user_id'         => 'required|exists:users,id',
                    'floor'           => 'required',
                    'bed_room'        => 'required',
                    'bath'            => 'required',
                    'balcony'         => 'required',
                    'toilet'          => 'required',
                    'start_date'      => 'required|date|date_format:Y-m-d|after'.$today.'|before:end_date',
                    'end_date'        => 'required|date|date_format:Y-m-d|after:'.$start->addDays($diff - 1),
                ];
                break;
        }
        return $rules;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
        'pic' =>'required|image|mimes:jpeg,png,jpg,gif|',
        'title' => 'required|max:225',
        'category_id'   => 'required|integer',
        'text' => 'required',
        'latLngLat' => 'required',
        'latLngLng' => 'required',
        'datum'         => 'required|date|after_or_equal:'.\Carbon\Carbon::today(),
      
        ];
    }
}
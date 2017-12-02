<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GarbageRequest extends FormRequest
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
            'name' => 'required',
            'city' => 'required',
            'country' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ];
    }
}
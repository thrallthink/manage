<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Team;

class StoreTeamPost extends FormRequest
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
            'name' => 'required|max:255',
            'code' => 'required|unique:team|max:255',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required.',
            'image.required'  => 'Choose an image file for logo.',
            'image.mimes'  => 'Logo image must be a file of type: jpeg, png, jpg, gif, svg.',
        ];
    }
}

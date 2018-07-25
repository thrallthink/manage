<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Team;
use App\Player;

class UpdatePlayerPost extends FormRequest
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

     
            $rules = ['name' => 'required|max:255',
            // 'code' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'];
        
        return $rules;
        
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required.',
            'image.required'  => 'Choose an image file for Player Image.',
            'image.mimes'  => 'Player image must be a file of type: jpeg, png, jpg, gif, svg.',
        ];
    }
}

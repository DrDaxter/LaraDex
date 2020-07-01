<?php

namespace LaraDex\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainerRequest extends FormRequest
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
        //validacion de los campos
        return [
            'name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'description' => 'required',
            'avatar' => 'required|image'
        ];
    }
}

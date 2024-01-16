<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AIUserPrototypeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'sex' => 'required|string',
            'age' => 'required|numeric',

            'appearance' => 'required|string',
            'character' => 'required|string',
            'likes' => 'required|string',
            'dislikes' => 'required|string',
            'activities' => 'required|string',

        ];
    }
}

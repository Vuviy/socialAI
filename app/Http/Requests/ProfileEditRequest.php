<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileEditRequest extends FormRequest
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
            'first_name' => 'string|nullable',
            'last_name' => 'string|nullable',
            'additional_name' => 'string|nullable',
            'name' => 'string|nullable',
            'email' => 'email|nullable',
            'birthday' => 'date|nullable',
            'phone_number' => 'numeric|nullable',
            'overview' => 'string|nullable',
            'photo' => 'image|nullable',
        ];
    }
}

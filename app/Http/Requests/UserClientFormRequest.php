<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserClientFormRequest extends FormRequest
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
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users|max:255',
            'password' => 'nullable|string|min:6|confirmed',
            'image' => 'nullable|image',
            'cell' => 'nullable|string',
            'link' => 'nullable|url',
            'country' => 'nullable|string',
            'status' => 'in:active,inactive',
        ];
    }
}

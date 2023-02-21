<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabboFormRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'slug' => ['nullable', 'string'],
            'emulator' => ['required', 'string'],
            'cms' => ['required', 'string'],
            'language' => ['required', 'string'],
            'url' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'string'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }
}

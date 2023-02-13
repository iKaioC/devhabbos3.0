<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionalFormRequest extends FormRequest
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
            'slug' => ['required', 'string'],
            'tag1' => ['required', 'string'],
            'tag2' => ['required', 'string'],
            'tag3' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'string'],
            'icon' => ['nullable'],
            'color' => ['nullable'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServerFormRequest extends FormRequest
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
            'memory' => ['required', 'string'],
            'vcpu' => ['required', 'string'],
            'type_storage' => ['required', 'string'],
            'amount_storage' => ['required', 'string'],
            'system' => ['required', 'string'],
            'locale' => ['required', 'string'],
            'price' => ['required', 'string'],
        ];
    }
}

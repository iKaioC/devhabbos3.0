<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketFormRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'priority' => 'required|string',
            'description' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O título do ticket é obrigatório.',
            'title.string' => 'O título do ticket deve ser uma string.',
            'title.max' => 'O título do ticket deve ter no máximo :max caracteres.',
            'category.required' => 'A categoria do ticket é obrigatória.',
            'category.string' => 'A categoria do ticket deve ser uma string.',
            'priority.required' => 'A prioridade do ticket é obrigatória.',
            'priority.string' => 'A prioridade do ticket deve ser uma string.',
            'description.required' => 'A descrição do ticket é obrigatória.',
            'description.string' => 'A descrição do ticket deve ser uma string.',
        ];
    }
}

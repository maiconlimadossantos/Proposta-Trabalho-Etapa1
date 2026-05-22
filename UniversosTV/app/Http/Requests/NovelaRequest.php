<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class NovelaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'diretor' => 'required|string|max:255',
            'ano_lancamento' => 'required|integer|min:1900|max:' . date('Y'),
            'genero_id' => 'required|exists:generos,id',
            'duracao' => 'required|integer|min:1',
            'legendado' => 'required|boolean',
            'dublado' => 'required|boolean',
            'disponivel' => 'required|boolean',
            'capa' => 'nullable|image|max:2048',
        ];
    }
}

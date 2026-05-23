<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PerfilTituloRequest extends FormRequest
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
            'perfil_id' => 'required|exists:perfis,id',
            'anime_id' => 'nullable|exists:animes,id',
            'filme_id' => 'nullable|exists:filmes,id',
            'novela_id' => 'nullable|exists:novelas,id',
            'serie_id' => 'nullable|exists:series,id',
            'assistido' => 'required|boolean',
            'avaliacao' => 'nullable|integer|min:1|max:10',
        ];
    }
}

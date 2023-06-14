<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePokemonRequest extends FormRequest
{
    protected $redirectRoute = 'trainers.create';
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'pokemon_name' => 'required|string',
            'pokemon_level' => 'required|integer|min:1|max:100',
            'type_id' => 'required|exists:types,id'
        ];
    }

    public function attributes() {

        return [
            'pokemon_name' => 'pokemon_name',
            'pokemon_level' => ' pokemon_level',
            'type_id' => 'type_id',
        ];
    }
}

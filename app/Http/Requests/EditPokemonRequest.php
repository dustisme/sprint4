<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPokemonRequest extends FormRequest
{
    protected $redirectRoute = 'trainers.store';
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

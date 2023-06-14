<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTrainerRequest extends FormRequest
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
            'trainer_name' => 'required|string|min:3',
            'trainer_code' => 'required|string|min:5|max:5',
        ];
    }

    public function attributes() {

        return [
            'trainer_name' => 'trainer_name',
            'trainer_code' => 'trainer_code',
        ];
    }
}

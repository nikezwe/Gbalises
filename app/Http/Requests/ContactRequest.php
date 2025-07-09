<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:20'],
            'prenom' => ['required', 'string', 'max:20'],
            'telephone' => ['required', 'integer', 'min:8'],
            'email'=> ['required','string','max:30'],
            'quantite' => ['required', 'integer', 'min:1'],
            
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Le champ email ne peut pas etre vide',
            'email.email' => 'L\'email doit avoir un format valide',
            'password.required' => 'Le champ mot de passe ne peut pas etre vide',
            'password.min' => 'Le mot de passe doit contenir au moins 4 character',
        ];
    }
}

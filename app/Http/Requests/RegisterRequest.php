<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Set to true to allow the request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'birth_date' => 'required|date|before:today',
            'salary' => 'required|numeric|min:0',
            'professional_status' => 'required|exists:professional_statuses,id',
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
            'email.unique' => 'Cet email est déjà utilisé',
            'password.required' => 'Le champ mot de passe ne peut pas etre vide',
            'password.min' => 'Le mot de passe doit contenir au moins 4 caractères',

            'name.required' => 'Le prénom est requis',
            'name.string' => 'Le prénom doit être une chaîne de caractères',
            'name.max' => 'Le prénom ne doit pas dépasser 100 caractères',

            'last_name.required' => 'Le nom est requis',
            'last_name.string' => 'Le nom doit être une chaîne de caractères',
            'last_name.max' => 'Le nom ne doit pas dépasser 100 caractères',

            'birth_date.required' => 'La date de naissance est requise',
            'birth_date.date' => 'La date de naissance doit être une date valide',
            'birth_date.before' => 'La date de naissance doit être dans le passé',

            'salary.required' => 'Le salaire est requis',
            'salary.numeric' => 'Le salaire doit être un nombre',
            'salary.min' => 'Le salaire doit être positif ou nul',

            'professional_status.required' => 'Le status professionnel est requis',
            'professional_status.exists' => 'Le status professionnel sélectionné est invalide',
        ];
    }
}

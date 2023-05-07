<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroUsuarioRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'O Nome é obrigatório.',
            'password.required'=>'A Senha é obrigatória.',
            'password.min'=>'A Senha tem que ter no minimo 8 caracteres.',
            'email.required'=>'O E-mail é obrigatório.',
            'email.email' => 'O Formato do email é invalido',
            'email.string' => 'O Formato do email é invalido',
            'email.unique'=>'Esse E-mail já está sendo utilizado, informe outro.',
        ];
    }
}

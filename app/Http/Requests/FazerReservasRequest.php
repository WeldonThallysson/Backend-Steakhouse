<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FazerReservasRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'mesa_id' => ['required', 'exists:mesas,id'],
        ];
    }

    public function messages()
    {
        return [
            'user_id.required'=>'O Nome é obrigatório.',
            'user_id.exists'=>'Usuario não existe.',
            'mesa_id.required'=>'O Id Mesa é obrigatório.',
            'mesa_id.exists'=>'Mesa não existe.',

        ];
    }
}

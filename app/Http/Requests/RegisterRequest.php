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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => '',
            'apellido_paterno' => '',
            'apellido_materno' => '',
            'alias'=> 'required|unique:users,alias',
            'calle' => '',
            'numero' => '',
            'colonia' => '',
            'cp' => '',
            'celular' => '',
            'local' => '',
            'frecuente' => '',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ];
    }
}

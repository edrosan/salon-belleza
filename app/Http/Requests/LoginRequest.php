<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'alias' => 'required',
            'password' => 'required',
        ];
    }

    public function getCredentials(){
        $alias = $this->get('alias');
        
        if($this -> isEmail($alias)){
            return [
                'email' => $alias,
                'password' => $this->get('password'),
            ];
        }

        return $this->only('alias', 'password');
    }

    public function isEmail($value){
        $factory = $this->container->make(ValidationFactory::class);

        return !$factory->make(['alias' => $value], ['alias' => 'email'])->fails();
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'phoneNumber' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ady meýdançasyny dolduryň',
            'surname.required' => 'Familiya meýdançasyny dolduryň',
            'email.required' => 'Email meýdançasyny dolduryň',
            'password.required' => 'Gysga Ady Ru meýdançasyny dolduryň',
            'address.required' => 'Salgysy meýdançasyny dolduryň',
            'phoneNumber.required' => 'Telefon belgi meýdançasyny dolduryň',

        ];
    }
}

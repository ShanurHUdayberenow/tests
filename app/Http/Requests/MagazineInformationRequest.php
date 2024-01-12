<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class MagazineInformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required',
            'slogan' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Salgy meýdançasyny dolduryň',
            'phoneNumber.required' => 'Telefon belgi meýdançasyny dolduryň',
            'email.required' => 'Email salgy meýdançasyny dolduryň',
            'slogan.required' => 'Şygar meýdançasyny dolduryň'
        ];
    }
}

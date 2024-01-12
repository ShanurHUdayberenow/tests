<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class UnitRequest extends FormRequest
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
            'name_tm' => 'required',
            'name_ru' => 'required',
            'shortName_tm' => 'required',
            'shortName_ru' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_tm.required' => 'Ady Tm meýdançasyny dolduryň',
            'name_ru.required' => 'Ady Ru meýdançasyny dolduryň',
            'shortName_tm.required' => 'Gysga Ady Tm meýdançasyny dolduryň',
            'shortName_ru.reäuired' => 'Gysga Ady Ru meýdançasyny dolduryň',
        ];
    }
}

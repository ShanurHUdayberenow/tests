<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class SettingRequest extends FormRequest
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
            'mainCurrencySymbol' => 'required',
            'mainCurrencyCode' => 'required',
            'mainCurrencyName' => 'required',
            'mainCurrencyFractionalUnit' => 'required',
            'mainCurrencyFractionalSymbol' => 'required', 
            'reportCurrencySymbol' => 'required',
            'reportCurrencyCode' => 'required',
            'reportCurrencyName' => 'required',
            'reportCurrencyFractionalUnit' => 'required',
            'reportCurrencyFractionalSymbol' => 'required'
        ];
    }

        public function messages()
    {
        return [
            'mainCurrencySymbol.required' => 'Esasy Pul birligi Symwoly meýdançasyny dolduryň',
            'mainCurrencyCode.required' => 'Esasy Pul birligi Kody meýdançasyny dolduryň',
            'mainCurrencyName.required' => 'Esasy Pul birligi Ady meýdançasyny dolduryň',
            'mainCurrencyFractionalUnit.required' => 'Esasy Pul birligi kiçi birligi meýdançasyny dolduryň',
            'mainCurrencyFractionalSymbol.required' => 'Esasy Pul birligi kiçi birligi Symwoly meýdançasyny dolduryň', 
            'reportCurrencySymbol.required' => 'Hasaplanan Pul birligi Symwoly meýdançasyny dolduryň',
            'reportCurrencyCode.required' => 'Hasaplanan Pul birligi Kody meýdançasyny dolduryň',
            'reportCurrencyName.required' => 'Hasaplanan Pul birligi Ady meýdançasyny dolduryň',
            'reportCurrencyFractionalUnit.required' => 'Hasaplanan Pul birligi kiçi birligi meýdançasyny dolduryň',
            'reportCurrencyFractionalSymbol.required' => 'Hasaplanan Pul birligi kiçi birlik symwoly meýdançasyny dolduryň'
        ];
    }
}

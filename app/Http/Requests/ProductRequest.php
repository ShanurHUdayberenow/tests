<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
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
            'name_en' => 'required',

            'slug' => 'required|unique:products,slug',
            'description_tm' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
            'images' => 'required',
            'categoryId' => 'required',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_tm.required' => 'Ady Tm meýdançasyny dolduryň',
            'name_ru.required' => 'Ady Ru meýdançasyny dolduryň',
            'name_en.required' => 'Ady En meýdançasyny dolduryň',
            'description_tm.required' => 'Barada Tm meýdançasyny dolduryň',
            'description_ru.required' => 'Barada Ru meýdançasyny dolduryň',
            'description_en.required' => 'Barada En meýdançasyny dolduryň',
            'images.required' => 'Surat saýlaň',
            'categoryId.required' => 'Kategoriýa saýlaň',
            'price.required' => 'Bahasyny dolduryň',
        ];
    }
}

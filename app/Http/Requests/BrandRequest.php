<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name_tm' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
            'description_tm' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
            'image' => 'required',
            'slug' => 'required|unique:brands',
        ];
    }

    public function messages()
    {
        return [
            'name_tm.required' => 'Brand Ady Tm meýdançasyny dolduryň',
            'name_ru.required' => 'Brand Ady Ru meýdançasyny dolduryň',
            'name_en.required' => 'Brand Ady En meýdançasyny dolduryň',
            'description_tm.required' => 'Brand Barada Tm meýdançasyny dolduryň',
            'description_ru.required' => 'Brand Barada Ru meýdançasyny dolduryň',
            'description_en.required' => 'Brand Barada En meýdançasyny dolduryň',
            'image.required' => 'Surat saýlaň',
            'slug.required' => 'Slug meýdançasyny dolduryň',
            'slug.unique' => 'Slug gaýtalanmaly däl'
        ];
    }
}

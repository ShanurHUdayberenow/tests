<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SubcategoryRequest extends FormRequest
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
            'image' => 'required',
            'slug' => 'required|unique:subcategories',
        ];
    }

    public function messages()
    {
        return [
            'name_tm.required' => 'Ady Tm meýdançasyny dolduryň',
            'name_ru.required' => 'Ady Ru meýdançasyny dolduryň',
            'name_en.required' => 'Ady En meýdançasyny dolduryň',
            'image.required' => 'Surat saýlaň',
            'slug.required' => 'Slug meýdançasyny dolduryň',
            'slug.unique' => 'Slug gaýtalanmaly däl'
        ];
    }
}

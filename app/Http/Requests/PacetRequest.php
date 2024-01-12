<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacetRequest extends FormRequest
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
            'image' => 'required',
            'slug' => 'required|unique:pacets,slug',
            'description_tm' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_tm.required' => 'Pacet Ady Tm meýdançasyny dolduryň',
            'name_ru.required' => 'Pacet Ady Ru meýdançasyny dolduryň',
            'name_en.required' => 'Pacet Ady En meýdançasyny dolduryň',
            'image.required' => 'Surat saýlaň',
            'description_tm.required' => 'Pacet barada Tm meýdançasyny dolduryň',
            'description_ru.required' => 'Pacet barada Ru meýdançasyny dolduryň',
            'description_en.required' => 'Pacet barada En meýdançasyny dolduryň',
            'slug.required' => 'Slug meýdançasyny dolduryň',
            'slug.unique' => 'Slug gaýtalanmaly däl'
        ];
    }
}

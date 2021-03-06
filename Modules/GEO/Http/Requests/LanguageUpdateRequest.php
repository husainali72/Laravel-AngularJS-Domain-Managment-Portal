<?php

namespace Modules\GEO\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_english' => 'required|unique:languages,name_english,'.$this->segment(4),
            'code' => 'required|min:2|max:2||unique:languages,code,'.$this->segment(4),
            'name' => 'required'
        ];
    }

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
     * Validation Messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            '*.required' => __('admin.general.validation.required'),
            '*.unique' => __('admin.general.validation.unique'),
            '*.min' => __('admin.general.validation.min'),
            '*.max' => __('admin.general.validation.max'),
        ];
    }
}

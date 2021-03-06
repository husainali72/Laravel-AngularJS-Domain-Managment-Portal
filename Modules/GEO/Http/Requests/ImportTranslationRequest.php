<?php

namespace Modules\GEO\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportTranslationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'language_id' => 'required',
            'file' => 'required|file|mimes:csv,xls,xlxs,txt|max:2042'
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
}

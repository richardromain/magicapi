<?php

namespace App\Http\Requests\Set;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|max:255|string|unique:sets,name',
            'acronym' => 'required|max:3|string|unique:sets,acronym',
            'url' => 'required|url',
        ];
    }
}

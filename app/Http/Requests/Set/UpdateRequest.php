<?php

namespace App\Http\Requests\Set;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|max:255|string|unique:sets,name,'.$this->set,
            'acronym' => 'required|max:3|string|unique:sets,acronym,'.$this->set,
            'url' => 'required|url',
        ];
    }
}

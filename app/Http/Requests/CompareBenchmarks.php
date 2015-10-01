<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CompareBenchmarks extends Request
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
            'compare' => 'required|array|min:2'
        ];
    }

    public function messages()
    {
        return [
            'compare.required' => 'Select benchmarks you want to compare.',
            'compare.min' => 'Select at least 2 benchmarks',
        ];
    }

}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Http\Requests\Input;

class CreateKeywordsPlan extends Request
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


        $rules = [
            'date' => 'required|date|unique:keywords_plans,date',
            'approved' => 'boolean'
        ];

        for ($i = 0; $i < count($this->keyword); $i++) {

            $rules['keyword'.$i] = 'array';

        }

        return $rules;

    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Http\Requests\Input;
use \Carbon\Carbon;

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

    public function sanitize()
    {
       $input = $this->all();

       $input['date'] = Carbon::parse( $this->date )->format('Y/m/d');

       $this->replace($input); 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $this->sanitize();

        $rules = [
            'date' => 'required|date|unique:keywords_plans,date',
            'approved' => 'boolean',
            'keyword' => 'required'
        ];


        for ($i = 0; $i < count($this->keyword); $i++) {

            $rules['keyword'.$i] = 'date';

        }

        return $rules;

    }
}

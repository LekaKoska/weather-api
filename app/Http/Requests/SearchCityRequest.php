<?php

namespace App\Http\Requests;

use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchCityRequest extends FormRequest
{

    public function rules(): array
    {
        return [

            'city' => "required|string|min:3"
        ];
    }
}

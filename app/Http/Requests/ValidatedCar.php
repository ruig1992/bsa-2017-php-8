<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatedCar extends FormRequest
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
    public function rules(): array
    {
        return [
            'model' => 'bail|required|max:255',
            'registration_number' => 'bail|required|alpha_num|size:6',
            'year' => 'bail|required|integer|between:1000,' . date('Y'),
            'color' => 'bail|required|alpha|max:255',
            'price' => 'bail|required|integer|min:0',
        ];
    }
}

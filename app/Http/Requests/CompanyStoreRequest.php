<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
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
            "name" => "required|regex:/^[a-zA-Z]+$/u|max:191",
            "email" => "required|unique:companies|email",
            "website" => "required|min:8",
            "logo" => "required|mimes:jpg,jpeg,png|max:1000",
        ];
    }
}

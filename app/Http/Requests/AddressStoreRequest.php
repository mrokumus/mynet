<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddressStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        if (Auth::check()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "person_id" => "required|integer|exists:persons,id",
            "address" => "required|string|min:10|max:255",
            "post_code" => "required|string|min:2|max:20",
            "city_name" => "required|string|min:2|max:50",
            "country_name" => "required|string|min:4|max:50",
        ];
    }
}

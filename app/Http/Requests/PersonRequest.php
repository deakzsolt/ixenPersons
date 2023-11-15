<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name'         => 'required|min:2|max:255',
            'last_name'          => 'required|min:2|max:255',
            'permanent_address'  => 'required|min:5|max:255',
            'mobile_number.*'    => 'nullable|numeric',
            'telephone_number.*' => 'nullable|numeric',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name'       => 'required|string',
            'surname'    => 'nullable|string',
            'patronymic' => 'nullable|string',
            'age'        => 'nullable|integer',
            'address'    => 'nullable|string',
            'gender'     => 'nullable|integer',
        ];

        if ($this->isMethod('POST')) {
            $rules['email'] = 'required|string|unique:users,email';
            $rules['password'] = 'required|string|confirmed';
        }

        return $rules;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email:dns,rfc',
            'picture' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'password' => [
                'required',
                Password::min(6)
                    ->letters()
                    ->mixedCase()
                // ->numbers()
                // ->symbols()
                // ->uncompromised()
            ],
        ];
    }
}

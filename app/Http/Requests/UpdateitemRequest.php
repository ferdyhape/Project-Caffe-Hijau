<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateitemRequest extends FormRequest
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
            'name' => 'required|max:20',
            'price' => 'required|integer',
            'category_id' => 'required|integer',
            'description' => 'nullable|string|max:255',
            'oldPicture' => 'required|mimes:png,jpg,jpeg|max:2048',
            'picture' => 'mimes:png,jpg,jpeg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.max' => 'Name must be under :max character(Alphabet/Symbol/Space/Number)',
            'category_id.integer' => 'You must choose a valid category',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //All users are authorize 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:150', Rule::unique(table:'categories',column: 'name')->ignore(id:request('category'),idColumn:'id')] // Enforce rules to ensure each element in the "name" column is unique, excluding the "id" element
        ];
    }

    public function messages()
    {
        // We can create custom messages errors
        return [
            'name.unique' => __('The category already exists.')
        ];
    }
}

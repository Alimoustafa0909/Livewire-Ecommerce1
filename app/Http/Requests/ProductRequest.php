<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'slug' => ['required', 'unique:products'],
            'short_description' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'price' => ['max:15', 'nullable'],
            'stock_status' => ['required'],
            'quantity' => ['required'],
            'featured' => ['required'],
            'SKU' => ['required', 'unique:products'],
            'image' => ['required', 'image'],
            'category_id' => ['required']
        ];
    }
}

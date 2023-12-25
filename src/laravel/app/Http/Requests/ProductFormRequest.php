<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
        return [

            'category_id' => [
                'integer',
                'required'
                ],

            'brand_id' => [
                'integer',
                'required'
                ],
            'name' => [
                'string',
                'required'
                ],
            'slug' => [
                'string',
                // 'required',
                ],
            'cost' => [
                // 'integer',
                // 'required'
                ],
            'sale_cost' => [
                // 'integer',
                // 'required'
                ],
            'quantity' => [
                'integer',
                // 'required'
                ],
            'color' => [
                'string',
                // 'required'
                ],
            'option' => [
                'string',
                // 'required'
                ],
            'status' => [
                
                'nullable'
                ],
            'trending' => [
                
                'nullable'
                ],
            'description' => [
                'nullable',
            ],   
            
            'image' => [
                'nullable',
                // 'image|mines:jpg,jepg,webp,png,svg'
            ]
        ];
    }
}
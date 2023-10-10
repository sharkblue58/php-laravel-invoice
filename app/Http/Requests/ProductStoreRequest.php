<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'product_name' => 'required|string|max:255',
            'section_id' => 'required|exists:sections,id',
            'description' => 'nullable',
        ];
    }
    public function messages(): array
    {
        return [
            'Product_name.required' =>'يرجي ادخال اسم المنتج',
            'Product_name.max' => 'يرجى تقصير اسم المنتج إلى 255 حرفًا كحد أقصى.',
            //'Product_name.min' => 'يرجى إدخال اسم قسم بحد أدنى 3 أحرف.',

            'section_id.required' =>'يرجي ادخال اسم القسم',
            'section_id.exists' =>'اسم القسم ليس موجود',
        ];
    }
}

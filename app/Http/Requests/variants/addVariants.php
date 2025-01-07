<?php

namespace App\Http\Requests\variants;

use App\Models\ProductVariants;
use Illuminate\Foundation\Http\FormRequest;

class addVariants extends FormRequest
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
            'ram' => 'required|string|max:50|regex:/^\d+$/',
            'memory' => 'required|string|max:50|regex:/^\d+$/',
            'quantity' => 'required|integer|min:1|max:10000',
            'price' => 'required|numeric|min:0|max:1000000000',
        ];
    }
    public function messages(): array
    {
        return [
            'ram.required' => 'RAM không được để trống.',
            'ram.string' => 'RAM phải là một chuỗi ký tự.',
            'ram.max' => 'RAM không được dài hơn 50 ký tự.',
            'ram.regex' => 'RAM chỉ được chứa số.',
            'memory.required' => 'Dung lượng bộ nhớ không được để trống.',
            'memory.string' => 'Dung lượng bộ nhớ phải là một chuỗi ký tự.',
            'memory.max' => 'Dung lượng bộ nhớ không được dài hơn 50 ký tự.',
            'memory.regex' => 'Dung lượng bộ nhớ chỉ được chứa số.',
            'quantity.required' => 'Số lượng không được để trống.',
            'quantity.integer' => 'Số lượng phải là một số nguyên.',
            'quantity.min' => 'Số lượng phải lớn hơn hoặc bằng 1.',
            'quantity.max' => 'Số lượng không được vượt quá 10,000.',
            'price.required' => 'Giá không được để trống.',
            'price.numeric' => 'Giá phải là một số.',
            'price.min' => 'Giá phải lớn hơn hoặc bằng 0.',
            'price.max' => 'Giá không được vượt quá 1 tỷ VND.',
        ];
    }
    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $productId = $this->input('product_id');
            $ram = $this->input('ram');
            $memory = $this->input('memory');

            $isDuplicate = ProductVariants::where('product_id', $productId)
                ->where('ram', $ram)
                ->where('memory', $memory)
                ->exists();

            if ($isDuplicate) {
                $validator->errors()->add('ram', 'Biến thể với RAM và Dung lượng bộ nhớ này đã tồn tại.');
            }
        });
    }
}

<?php

namespace App\Http\Requests\variants;

use App\Models\ProductVariants;
use Illuminate\Foundation\Http\FormRequest;

class updateVariants extends FormRequest
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
    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $productId = $this->input('product_id');
            $ram = $this->input('ram');
            $memory = $this->input('memory');

            // Lấy ID của biến thể đang sửa, nếu có
            $currentVariantId = $this->route('id'); // Lấy ID từ route (chắc chắn rằng route có chứa thông tin này)
            $isDuplicate = ProductVariants::where('product_id', $productId)
                ->where('ram', $ram)
                ->where('memory', $memory)
                ->where('id', '!=', $currentVariantId) // Loại trừ biến thể hiện tại
                ->exists();

            if ($isDuplicate) {
                $validator->errors()->add('ram', 'Biến thể với RAM và Dung lượng bộ nhớ này đã tồn tại.');
            }
        });
    }
    public function messages(): array
    {
        return [
            'ram.required' => 'RAM không được để trống.',
            'ram.regex' => 'RAM chỉ được chứa số.',
            'memory.required' => 'Dung lượng bộ nhớ không được để trống.',
            'memory.regex' => 'Dung lượng bộ nhớ chỉ được chứa số.',
            'quantity.required' => 'Số lượng không được để trống.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'price.required' => 'Giá không được để trống.',
            'price.numeric' => 'Giá phải là số.',
        ];
    }

}
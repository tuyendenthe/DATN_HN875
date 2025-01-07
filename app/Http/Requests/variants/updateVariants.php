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
            // Lấy thông tin từ request
            $productId = $this->input('product_id');
//            $this->dd($productId);
            $ram = $this->input('ram');
            $memory = $this->input('memory');
            $currentVariantId = $this->route('variant'); // Lấy ID của biến thể đang cập nhật từ route

            // Kiểm tra xem có biến thể khác trùng với RAM và MEMORY đã tồn tại cho sản phẩm này
            $isDuplicate = ProductVariants::where('product_id', $productId)
                ->where('ram', $ram)
                ->where('memory', $memory)
                ->where('id', '!=', $currentVariantId) // Loại trừ biến thể hiện tại
                ->exists();

            if ($isDuplicate) {
                $validator->errors()->add('ram', 'Biến thể với RAM và Dung lượng bộ nhớ này đã tồn tại cho sản phẩm này.');
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

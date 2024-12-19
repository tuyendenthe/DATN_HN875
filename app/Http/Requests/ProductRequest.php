<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Đổi thành true để bật tính năng xác thực
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
{
    return [
        'name' => 'required|string|max:255',
        'quantity' => 'required|integer|min:1',
        'image' => 'required|image',
        'price' => 'required|numeric|min:1',
        'content_short' => 'required|string',
        'content' => 'required|string',
        'chip' => 'required|string',
        'ram' => 'required|string',
        'color' => 'required|string',
        'memory' => 'required|string',
        'screen' => 'required|string',
        'resolution' => 'required|string',
    ];
}


    /**
     * Custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
{
    return [
        'name.required' => 'Tên sản phẩm là bắt buộc.',
        'quantity.required' => 'Số lượng là bắt buộc.',
        'quantity.integer' => 'Số lượng phải là một số nguyên.',
        'quantity.min' => 'Số lượng phải lớn hơn 0.',
        'image.required' => 'Hình ảnh là bắt buộc.',
        'image.image' => 'Tệp tải lên phải là hình ảnh.',
        'price.required' => 'Giá sản phẩm là bắt buộc.',
        'price.numeric' => 'Giá sản phẩm phải là một số hợp lệ.',
        'price.min' => 'Giá sản phẩm phải lớn hơn 0.',
        'content_short.required' => 'Mô tả ngắn là bắt buộc.',
        'content.required' => 'Nội dung là bắt buộc.',
        'chip.required' => 'Thông tin chip là bắt buộc.',
        'ram.required' => 'RAM là bắt buộc.',
        'color.required' => 'Màu sắc là bắt buộc.',
        'memory.required' => 'Bộ nhớ là bắt buộc.',
        'screen.required' => 'Thông tin màn hình là bắt buộc.',
        'resolution.required' => 'Độ phân giải là bắt buộc.',
    ];
}

}

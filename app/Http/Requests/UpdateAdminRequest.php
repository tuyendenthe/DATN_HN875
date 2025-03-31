<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Thay đổi nếu cần thiết cho logic phân quyền của bạn
    }

    public function rules()
    {
        $userId = $this->route('id'); // Lấy ID người dùng từ route

        return [
            'name' => 'required|string|max:50|min:3|unique:users,name,' . $userId, // Thêm kiểm tra duy nhất cho name
            'email' => 'required|string|email|max:50|unique:users,email,' . $userId,
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'role' => 'required|in:1,2,3',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi.',
            'name.min' => 'Tên phải có ít nhất 3 ký tự.',
            'name.max' => 'Tên không được vượt quá 50 ký tự.',
            'name.unique' => 'Tên đã tồn tại.', // Thông báo khi tên trùng
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.max' => 'Email không được vượt quá 50 ký tự.',
            'email.unique' => 'Email đã tồn tại.',
            'address.string' => 'Địa chỉ phải là một chuỗi.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'image.image' => 'Tệp tải lên phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
            'image.max' => 'Hình ảnh không được lớn hơn 2MB.',
            // 'role.required' => 'Quyền tài khoản là bắt buộc.',
            // 'role.in' => 'Quyền tài khoản không hợp lệ.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Change this based on your authorization logic
    }

    public function rules()
    {
        return [
            'current_password' => 'required|string|min:8|max:20',
            'new_password' => 'required|string|min:8|max:20|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Mật khẩu hiện tại là bắt buộc.',
            'current_password.min' => 'Mật khẩu hiện tại phải có ít nhất 8 ký tự.',
            'current_password.max' => 'Mật khẩu hiện tại không được vượt quá 20 ký tự.',
            'new_password.required' => 'Mật khẩu mới là bắt buộc.',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
            'new_password.max' => 'Mật khẩu mới không được vượt quá 20 ký tự.',
            'new_password.confirmed' => 'Mật khẩu mới không khớp.',
        ];
    }
}

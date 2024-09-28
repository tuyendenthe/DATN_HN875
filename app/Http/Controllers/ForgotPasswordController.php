<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ResetPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email'); // Tạo view cho yêu cầu khôi phục mật khẩu
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Kiểm tra người dùng có tồn tại không
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Không tìm thấy địa chỉ email.']);
        }

        // Tạo token khôi phục mật khẩu
        $token = Password::getRepository()->create($user);

        // Kiểm tra xem token có hợp lệ không
        if (!$token) {
            return back()->withErrors(['email' => 'Đã xảy ra lỗi khi tạo token.']);
        }

        // Gửi email
        try {
            Mail::to($request->email)->send(new ResetPasswordMail($token, $request->email));
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Không thể gửi email: ' . $e->getMessage()]);
        }

        return back()->with('status', 'Link khôi phục mật khẩu đã được gửi!');
    }
}

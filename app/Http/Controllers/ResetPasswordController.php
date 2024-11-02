<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
{
    return view('auth.passwords.reset')->with(['token' => $token]);
}

public function reset(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8',
        'token' => 'required',
    ], [
        'email.required' => 'Email không được để trống',
        'email.email' => 'Email không đúng định dạng',
        'password.required' => 'Mật khẩu không được để trống',
        'password.confirmed' => 'Mật khẩu không trùng khớp',
        'password.min' => 'Mật khẩu không đủ 8 ký tự',
    ]);

    $resetStatus = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
        }
    );

    return $resetStatus === Password::PASSWORD_RESET
        ? redirect()->route('login')->with([
            'message' => 'Mật khẩu đã được khôi phục!'])
        : back()->withErrors(['email' => 'Đã xảy ra lỗi.']);
}
}

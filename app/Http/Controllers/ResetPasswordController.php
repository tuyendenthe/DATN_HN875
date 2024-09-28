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
        'password' => 'required|confirmed|min:6',
        'token' => 'required',
    ]);

    $resetStatus = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
        }
    );

    return $resetStatus === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', 'Mật khẩu đã được khôi phục!')
        : back()->withErrors(['email' => 'Đã xảy ra lỗi.']);
}
}

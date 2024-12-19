<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (Auth::check()) {
            // Kiểm tra vai trò của người dùng
            if (Auth::user()->role == '1' || Auth::user()->role == '3') {
                return $next($request); // Cho phép truy cập nếu là admin hoặc admin phụ
            } else {
                return redirect()->route('login')->with([
                    'message' => 'Bạn không có quyền. Vui lòng đăng nhập trước!'
                ]);
            }
        }

        // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
        return redirect()->route('login')->with([
            'message' => 'Vui lòng đăng nhập trước!'
        ]);
    }
}

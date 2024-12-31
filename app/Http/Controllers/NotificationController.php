<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController  extends Controller
{
    public function index()
{
    $notifications = Notification::all(); // Lấy tất cả thông báo
    $unreadCount = Notification::where('is_read', false)->count(); // Tính số thông báo chưa đọc

    // Kiểm tra dữ liệu
    dd($notifications, $unreadCount);

    return view('admins.notifications.index', compact('notifications', 'unreadCount'));
}    public function notifications()
{
    // Lấy tất cả thông báo
    $notifications = Notification::all();

    // Nếu cần, bạn có thể lấy dữ liệu khác ở đây
    // Ví dụ: $data = SomeModel::all(); hoặc bất kỳ truy vấn nào mà bạn cần

    $data = []; // Khởi tạo biến $data nếu không cần thiết

    // Truyền biến vào chế độ xem
    return view('admins.notifications', compact('notifications', 'data'));
}
}

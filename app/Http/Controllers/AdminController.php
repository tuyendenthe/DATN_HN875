<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Phương thức để hiển thị thông báo chưa đọc
    public function notifications()
    {
        // Lấy các thông báo chưa đọc từ cơ sở dữ liệu và bao gồm bill_code
        $notifications = Notification::where('is_read', false)->get(['id', 'message', 'bill_code']); // Bao gồm bill_code

        // Trả về view với danh sách thông báo
        return view('admins.notifications', compact('notifications'));
    }
    // Phương thức để đánh dấu thông báo là đã đọc
    public function markAsRead($id)
    {
        // Tìm thông báo theo ID
        $notification = Notification::find($id);
        if ($notification) {
            $notification->is_read = true; // Đánh dấu là đã đọc
            $notification->save(); // Lưu thay đổi
        }

        // Quay lại trang trước với thông báo thành công
        return redirect()->back()->with('success', 'Thông báo đã được đánh dấu là đã đọc.');
    }
}

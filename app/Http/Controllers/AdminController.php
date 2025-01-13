<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Phương thức để hiển thị thông báo chưa đọc
    public function notifications()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->get();
        return view('admins.notifications', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = Notification::find($id);
        if ($notification) {
            $notification->is_read = true;
            $notification->save();
        }
        return redirect()->route('notifications.index'); // Redirect back to notifications list
    }
}

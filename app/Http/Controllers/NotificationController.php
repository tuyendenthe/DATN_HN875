<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController  extends Controller
{
    public function index()
    {
        $notifications = Notification::all(); // Hoặc truy vấn phù hợp khác
        return view('admins.notifications', compact('notifications'));
    }
}

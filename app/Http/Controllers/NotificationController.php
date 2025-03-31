<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Bill;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function bill()
{
    return $this->belongsTo(Bill::class, 'bill_code', 'bill_code');
}
    public function index()
    {
        $notifications = Notification::with('bill')->get(); // Load notifications with associated bills
        $unreadCount = Notification::where('is_read', false)->count(); // Count unread notifications

        // Check data for debugging
        // dd($notifications, $unreadCount); // Uncomment for debugging

        return view('admins.notifications.index', compact('notifications', 'unreadCount'));
    }

    public function notifications()
    {
        // Retrieve all notifications
        $notifications = Notification::with('bill')->get(); // Load notifications with associated bills

        // If needed, you can fetch other data here
        $data = []; // Initialize $data if not needed

        // Pass variables to the view
        return view('admins.notifications', compact('notifications', 'data'));
    }
}

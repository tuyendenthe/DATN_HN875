<?php
namespace App\Http\Controllers;

use App\Events\SendAdminMessage;
use App\Events\SendSellerMessage;
use App\Events\SendUserMessage;
use App\Models\Chat;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class ChatsController extends Controller
{

   
 
    public function fetchMessagesFromUserToAdmin(Request $request)
    {
      
       
        $receiverId = $request->input('receiver_id');
  
        $sellerId = session('LoggedUserInfo');
     
        $messages = Chat::where(function($query) use ($sellerId, $receiverId) {
            $query->where('sender_id', $sellerId)
                  ->where('receiver_id', $receiverId);
        })->orWhere(function($query) use ($sellerId, $receiverId) {
            $query->where('sender_id', $receiverId)
                  ->where('receiver_id', $sellerId);
        })->orderBy('created_at', 'asc')->get();
    
        return response()->json(['messages' => $messages]);
    }

    public function sendMessageFromUserToAdmin(Request $request)
    {
     
    
        // Validate the incoming request data
        $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required|exists:admins,id',
        ]);
        
      
        $chat =Chat::create([
            'sender_id' => session('LoggedUserInfo'),
            'receiver_id' => $request->input('receiver_id'),
            'message' => $request->input('message'),
            'seen' => 0, // Default to not seen

        ]);
     
        event(new SendUserMessage($chat));
    
        return response()->json(['success' => true, 'message' => 'Message sent successfully']);
    }
    





public function sendMessage(Request $request)
{
    $request->validate([
        'message' => 'required|string',
        'receiver_id' => 'required|integer|exists:users,id', // Ensure the receiver_id is a valid user id
    ]);

    $LoggedAdminInfo = Admin::find(session('LoggedAdminInfo'));
    if (!$LoggedAdminInfo) {
        return response()->json([
            'success' => false,
            'message' => 'You must be logged in to send a message',
        ]);
    }

    $message = new Chat();
    $message->sender_id = $LoggedAdminInfo->id;
    $message->receiver_id = $request->receiver_id;
    $message->message = $request->message;
    $message->save();
    broadcast(new SendAdminMessage($message))->toOthers();

    return response()->json([
        'success' => true,
        'message' => 'Message sent successfully',
    ]);
}
public function fetchMessages(Request $request)
{

    
    $receiverId = $request->input('receiver_id');
    
    // Fetch the logged-in admin using the session
    $adminId = session('LoggedAdminInfo');
  
    $LoggedAdminInfo = Admin::find($adminId);

    if (!$LoggedAdminInfo) {
        return response()->json([
            'error' => 'Admin not found. You must be logged in to access messages.'
        ], 404);
    }

    // Fetch messages between the admin and the specified seller
    $messages = Chat::where(function ($query) use ($adminId, $receiverId) {
        $query->where('sender_id', $adminId)
              ->where('receiver_id', $receiverId);
    })->orWhere(function ($query) use ($adminId, $receiverId) {
        $query->where('sender_id', $receiverId)
              ->where('receiver_id', $adminId);
    })->orderBy('created_at', 'asc')->get();

    return response()->json([
        'messages' => $messages
    ]);
}
}

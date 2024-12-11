<?php

namespace App\Http\Controllers;

use App\Models\BookFix;
use Illuminate\Http\Request;
use App\Mail\ScheduledFixEmail;

use Illuminate\Support\Facades\Mail;

class BookFixController extends Controller
{
    public function sendBookFix(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'content' => 'nullable|string',
        ]);

        // Lưu thông tin liên hệ vào database
        $BookFixs = BookFix::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'content' => $request->input('content'),
        ]);


        // return back()->with('message1', 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.');
        return redirect()->route('index')->with('message1', 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.');

    }
    public function index()
    {
        $BookFixs = BookFix::all();

        return view('admins.bookfix.index', compact('BookFixs'));
    }
    public function updateSuccess(BookFix $BookFixs)
    {
        // Cập nhật trạng thái liên lạc thành công
        $BookFixs->status_id = 2; // Trạng thái "Liên lạc thành công"
        $BookFixs->save();

        return back()->with('success', 'Đã cập nhật trạng thái ');
    }

    public function updateFailed(BookFix $BookFixs)
    {
        // Cập nhật trạng thái liên lạc thất bại
        $BookFixs->status_id = 3; // Trạng thái "Không thể liên lạc"
        $BookFixs->save();

        return back()->with('success', 'Đã cập nhật trạng thái .');
    }

    public function updateSchedule(Request $request, BookFix $bookfix)
{
    // Lấy ngày hôm nay
    $today = now()->toDateString();

    // Kiểm tra validation
    $request->validate([
        'fix_date' => 'required|date|after_or_equal:' . $today,
    ], [
        'fix_date.after_or_equal' => 'Ngày sửa chữa không thể trước ngày hôm nay.',
    ]);

    // Cập nhật ngày sửa chữa
    $bookfix->update([
        'fix_date' => $request->fix_date,
    ]);

    return redirect()->route('bookfix.index')->with('success', 'Ngày sửa chữa đã được cập nhật.');
}
public function markAsScheduled(BookFix $contact)
{
    // Cập nhật trạng thái lịch sửa chữa
    $contact->status_id = 2; // Đã lên lịch
    $contact->save();

    // Gửi email cho khách hàng
    Mail::to($contact->email)->send(new ScheduledFixEmail($contact));

    // Redirect hoặc trả về phản hồi
    return redirect()->route('bookfix.index')->with('success', 'Lịch sửa chữa đã được lên lịch và thông báo đã được gửi.');
}



}

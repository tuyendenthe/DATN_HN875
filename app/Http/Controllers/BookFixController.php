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
        'name' => [
            'required',
            'string',
            'max:255',
            'regex:/^[\pL\s]+$/u', // Chỉ cho phép chữ và khoảng trắng
        ],
        'email' => [
            'required',
            'email',
            'ends_with:@gmail.com,@yahoo.com', // Chỉ cho phép email từ Gmail hoặc Yahoo
        ],
        'phone' => [
            'required',
            'string',
            'regex:/^\+?[0-9]{10,15}$/', // Số điện thoại từ 10-15 ký tự, có thể bắt đầu bằng "+"
        ],
        'content' => [
            'nullable',
            'string',
            'min:10', // Nội dung tối thiểu 10 ký tự
            'max:500', // Tối đa 500 ký tự
        ],
    ], [
        // Thông báo lỗi tùy chỉnh
        'name.required' => 'Tên không được để trống.',
        'name.regex' => 'Tên chỉ được chứa chữ và khoảng trắng.',
        'name.max' => 'Tên không được vượt quá 255 ký tự.',
        'email.required' => 'Email không được để trống.',
        'email.email' => 'Email phải là định dạng hợp lệ.',
        'email.ends_with' => 'Email chỉ được phép từ Gmail hoặc Yahoo.',
        'phone.required' => 'Số điện thoại không được để trống.',
        'phone.regex' => 'Số điện thoại phải có từ 10-15 chữ số và có thể bắt đầu bằng "+".',
        'content.min' => 'Nội dung phải có ít nhất 10 ký tự.',
        'content.max' => 'Nội dung không được vượt quá 500 ký tự.',
    ]);

    // Lưu thông tin liên hệ vào database
    $BookFixs = BookFix::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'content' => $request->input('content'),
    ]);

    return redirect()->route('index')->with('message1', 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.');
}


    // public function index()
    // {
    //     $BookFixs = BookFix::all();

    //     return view('admins.bookfix.index', compact('BookFixs'));
    // }
    public function index(Request $request)
{
    $query = BookFix::query();

    // Lọc theo trạng thái nếu có
    if ($request->has('status') && $request->status != '') {
        $query->where('status_id', $request->status);
    }

    $BookFixs = $query->get();

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

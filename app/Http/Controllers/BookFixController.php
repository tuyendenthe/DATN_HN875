<?php

namespace App\Http\Controllers;

use App\Models\BookFix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookFixController extends Controller
{
    public function sendBookFix(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]+$/|max:15', // Chỉ cho phép chữ số
            'fix_date' => 'required|date_format:Y-m-d', // Định dạng ngày
            'content' => 'nullable|string',
        ]);
// dd(
//     $request
// );
        // Lưu thông tin vào database
        $BookFix = BookFix::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'fix_date' => $request->input('fix_date'),
            'content' => $request->input('content'),
        ]);


        // Thêm thông báo thành công
        return redirect()->back()->with('message1', 'Thông tin đã được lưu thành công!');
    }
    public function index()
    {
        $BookFixs = BookFix::latest()->get();

        return view('admins.bookfix.index', compact('BookFixs'));
    }
    public function updateSuccess(BookFix $BookFix)
    {
        // Cập nhật trạng thái liên lạc thành công
        $BookFix->status_id = 2; // Trạng thái "Liên lạc thành công"
        $BookFix->save();

        // Gửi email thông báo liên lạc thành công
        Mail::send('emails.BookFix_success', ['BookFix' => $BookFix], function ($message) use ($BookFix) {
            $message->to($BookFix->email) // Gửi đến email của người liên hệ
                ->subject('Thông báo: Liên lạc thành công')
                ->from('vietpqph31806@fpt.edu.vn', 'Your Name'); // Thêm địa chỉ email người gửi và tên
        });


        return back()->with('message1', 'Đã cập nhật trạng thái và gửi email thành công.');
    }

    public function updateFailed(BookFix $BookFix)
    {
        // Cập nhật trạng thái liên lạc thất bại
        $BookFix->status_id = 3; // Trạng thái "Không thể liên lạc"
        $BookFix->save();

        // Gửi email thông báo liên lạc thất bại
        Mail::send('emails.BookFix_failed', ['BookFix' => $BookFix], function ($message) use ($BookFix) {
            $message->to($BookFix->email) // Gửi đến email của người liên hệ
                ->subject('Thông báo: Liên lạc thất bại')
                ->from('vietpqph31806@fpt.edu.vn', 'Your Name'); // Thêm địa chỉ email người gửi và tên
        });


        return back()->with('message1', 'Đã cập nhật trạng thái và gửi email thông báo thất bại.');
    }
}

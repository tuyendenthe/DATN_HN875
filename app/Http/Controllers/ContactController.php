<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function sendContact(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'content' => 'nullable|string',
        ]);

        // Lưu thông tin liên hệ vào database
        $contact = Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'content' => $request->input('content'),
        ]);


        // return back()->with('message1', 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.');
        return redirect()->route('index')->with('message1', 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.');
    }
    // public function index()
    // {
    //     $contacts = Contact::all();
    //     return view('admins.contact.index', compact('contacts'));
    // }

    public function index(Request $request)
{
    // Kiểm tra trạng thái nếu có trong request
    $status = $request->input('status');

    // Nếu có trạng thái, lọc theo trạng thái đó
    if ($status) {
        $contacts = Contact::where('status_id', $status)->get();
    } else {
        // Nếu không có lọc, lấy tất cả các liên hệ
        $contacts = Contact::all();
    }

    // Trả về view với các liên hệ đã lọc
    return view('admins.contact.index', compact('contacts'));
}

    public function updateSuccess(Contact $contact)
    {
        // Cập nhật trạng thái liên lạc thành công
        $contact->status_id = 2; // Trạng thái "Liên lạc thành công"
        $contact->save();

        return back()->with('success', 'Đã cập nhật trạng thái ');
    }

    public function updateFailed(Contact $contact)
    {
        // Cập nhật trạng thái liên lạc thất bại
        $contact->status_id = 3; // Trạng thái "Không thể liên lạc"
        $contact->save();

        return back()->with('success', 'Đã cập nhật trạng thái .');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $contact = Contact::findOrFail($request->contact_id);

        // Gửi email với nội dung tùy chỉnh
        Mail::to($contact->email)->send(new ContactMail($contact, $request->subject, $request->content));

        return redirect()->back()->with('success', 'Email đã được gửi thành công!');
    }







}

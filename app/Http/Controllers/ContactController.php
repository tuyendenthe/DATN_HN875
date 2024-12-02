<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
    public function index()
    {
        $contacts = Contact::all();
        return view('admins.contact.index', compact('contacts'));
    }
    public function updateSuccess(Contact $contact)
    {
        // Cập nhật trạng thái liên lạc thành công
        $contact->status_id = 2; // Trạng thái "Liên lạc thành công"
        $contact->save();

        // Gửi email thông báo liên lạc thành công
        // Gửi email thông báo liên lạc thành công
        Mail::send('emails.contact_success', ['contact' => $contact], function ($message) use ($contact) {
            $message->to($contact->email) // Gửi đến email của người liên hệ
                ->subject('Thông báo: Liên lạc thành công')
                ->from('vietpqph31806@fpt.edu.vn', 'Your Name'); // Thêm địa chỉ email người gửi và tên
        });


        return back()->with('success', 'Đã cập nhật trạng thái và gửi email thành công.');

    }

    public function updateFailed(Contact $contact)
    {
        // Cập nhật trạng thái liên lạc thất bại
        $contact->status_id = 3; // Trạng thái "Không thể liên lạc"
        $contact->save();

        // Gửi email thông báo liên lạc thất bại
        // Gửi email thông báo liên lạc thất bại
        Mail::send('emails.contact_failed', ['contact' => $contact], function ($message) use ($contact) {
            $message->to($contact->email) // Gửi đến email của người liên hệ
                ->subject('Thông báo: Liên lạc thất bại')
                ->from('vietpqph31806@fpt.edu.vn', 'Your Name'); // Thêm địa chỉ email người gửi và tên
        });


        return back()->with('success', 'Đã cập nhật trạng thái và gửi email thông báo thất bại.');
    }
}

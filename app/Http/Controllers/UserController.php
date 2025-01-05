<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateAdminRequest;
class UserController extends Controller
{


    public function listUser()
    {
        $listUser = User::paginate(5); // Thay đổi từ all() sang paginate()
        return view('admins.users.listuser', compact('listUser'));
    }
public function detail(string $id)
{
    $user = User::findOrFail($id);
    return view('admins.users.detailuser', compact('user'));
}


    public function addUser()
    {
        return view('admins.users.createuser');
    }

    public function store(Request $request)
    {
        // Define validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'role' => 'required|in:2', // Default to User role
        ];

        // If the authenticated user is an admin, allow all roles
        if (auth()->user()->role == 1) {
            $rules['role'] = 'required|in:1,2,3'; // Admin can create Admins, Users, and Employees
        }


        // Define custom validation messages
        $messages = [
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'address.string' => 'Địa chỉ phải là một chuỗi.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.string' => 'Mật khẩu phải là một chuỗi.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
            'image.image' => 'Tệp tải lên phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif.',
            'image.max' => 'Hình ảnh không được lớn hơn 2MB.',
            // 'role.required' => 'Quyền tài khoản là bắt buộc.',
            // 'role.in' => 'Quyền tài khoản không hợp lệ.',
        ];

        // Validate the request with custom messages
        $request->validate($rules, $messages);

        // Check if email already exists
        $check = User::where('email', $request->email)->first();
        if ($check) {
            return redirect()->route('admin1.users.adduser')->with('error', 'Email đã tồn tại.');
        }

        // Create the new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'role' => $request->role,
        ]);

        // Handle image upload if it exists
        if ($request->hasFile('image')) {
            $data_images = $request->file('image')->store('images', 'public');
            $user->update(['image' => $data_images]);
        }


        // If the new user is an Admin (role = 1), create an entry in the Admin table
        if ($request->role == 1 || $request->role == 3) {

            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password), // Save password securely
                'status' => 1,
                'username' => $request->name,

            ]);
        }

        return redirect()->route('admin1.users.listuser')->with('message1', 'Thêm thành công.');
    }
    public function edit(string $id)
{
    $user = User::findOrFail($id);
    return view('admins.users.edituser', compact('user'));
}
public function updateUser(Request $req, $id)
{
    $user = User::findOrFail($id);

    $req->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'address' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'name.required' => 'Tên không được để trống.',
        'email.required' => 'Email không được để trống.',
        'image.image' => 'File tải lên phải là hình ảnh.',
    ]);

    $user->name = $req->name;
    $user->email = $req->email;
    $user->address = $req->address;


    // if ($req->hasFile('image')) {
    //     $path = $req->file('image')->store('images/users', 'public');
    //     $user->image = $path;
    // }
    if ($req->hasFile('image')) {

        $path = $req->file('image')->store('images/users', 'public');
        $user->image = $path;
    }

    $user->save();

    return back()->with('message1', 'Cập nhật tài khoản thành công');
}
// public function changePassword(Request $request)
// {
//     $request->validate([
//         'current_password' => 'required|string|min:8',
//         'new_password' => 'required|string|min:8|confirmed',
//     ], [
//         'current_password.required' => 'Mật khẩu hiện tại là bắt buộc.',
//         'current_password.string' => 'Mật khẩu hiện tại phải là chuỗi.',
//         'current_password.min' => 'Mật khẩu hiện tại phải có ít nhất 8 ký tự.',
//         'new_password.required' => 'Mật khẩu mới là bắt buộc.',
//         'new_password.string' => 'Mật khẩu mới phải là chuỗi.',
//         'new_password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
//         'new_password.confirmed' => 'Mật khẩu mới không khớp.',
//     ]);

//     $user = auth()->user();

//     // Kiểm tra mật khẩu hiện tại
//     if (!password_verify($request->current_password, $user->password)) {
//         return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
//     }

//     // Cập nhật mật khẩu mới
//     $user->password = bcrypt($request->new_password);
//     $user->save();

//     return back()->with('message1', 'Đổi mật khẩu thành công.');
// }
public function searchUser(Request $request)
{
    $query = $request->input('name');

    // Tìm kiếm người dùng theo tên
    $listUser = User::where('name', 'LIKE', '%' . $query . '%')->paginate(10);

    return view('admins.users.listuser', compact('listUser')); // Đường dẫn đến view đúng
}
public function showChangePasswordForm()
{
    return view('admins.users.changepassword'); // Ensure this view exists
}

public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required|string|min:8',
        'new_password' => 'required|string|min:8|confirmed',
    ], [
        'current_password.required' => 'Mật khẩu hiện tại là bắt buộc.',
        'new_password.required' => 'Mật khẩu mới là bắt buộc.',
        'new_password.confirmed' => 'Mật khẩu mới không khớp.',
    ]);

    $user = auth()->user();

    // Check the current password
    if (!password_verify($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
    }

    // Update the password
    $user->password = bcrypt($request->new_password);
    $user->save();

    return back()->with('message1', 'Đổi mật khẩu thành công.');
}
// public function showChangePasswordForm()
// {
//     return view('C');
// }
public function editUser($id)
{
    $user = User::findOrFail($id);
    return view('admins.users.edit_user', compact('user'));
}


    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin1.users.listuser')->with('message1', 'Xóa thành công.');
    }
      public function toggleStatus(string $id)
{
    $user = User::findOrFail($id);
    // Đổi trạng thái giữa 'hoạt động' và 'ngưng hoạt động'
    $user->status = ($user->status === '1') ? '2' : '1'; // 1: Hoạt động, 2: Ngưng hoạt động
    $user->save();

    return redirect()->route('admin1.users.listuser')->with('message1', 'Trạng thái tài khoản đã được cập nhật.');
}
// public function update(Request $request, string $id)
// {
//     $user = User::findOrFail($id);

//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|string|email|max:255|unique:users,email,' . $id,
//         'address' => 'nullable|string|max:255',
//         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//         'role' => 'required',
//     ]);

//     $data = [
//         'name' => $request->name,
//         'email' => $request->email,
//         'address' => $request->address,
//         'role' => $request->role, // Cập nhật vai trò từ request
//     ];

//     if ($request->filled('password')) {
//         $data['password'] = bcrypt($request->password);
//     }

//     if ($request->hasFile('image')) {
//         $data['image'] = $request->file('image')->store('images', 'public');
//     }

//     $user->update($data);

//     return redirect()->route('admin1.users.listuser')->with('message1', 'Cập nhật thành công.');
// }





public function update(UpdateAdminRequest $request, string $id)
{
    $user = User::findOrFail($id);

    // Update user details
    $user->name = $request->name;
    $user->email = $request->email;
    $user->address = $request->address;
    $user->role = $request->role;

    // Handle image upload if it exists
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images/users', 'public');
        $user->image = $path;
    }

    $user->save();

    return redirect()->route('admin1.users.listuser')->with('message1', 'Cập nhật thành công.');
}

}

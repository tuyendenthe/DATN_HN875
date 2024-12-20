<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required|in:2,3',
        ]);

        // Kiểm tra xem email đã tồn tại chưa
        $check = User::where('email', $request->email)->first();
        if ($check) {
            return redirect()->route('admin1.users.adduser')->with('error', 'Email đã tồn tại.');
        }

        // Tạo người dùng mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'role' => $request->role, // Sử dụng trực tiếp giá trị role từ request
        ]);

        // Lưu ảnh nếu có
        if ($request->hasFile('image')) {
            $data_images = $request->file('image')->store('images', 'public');
            $user->update(['image' => $data_images]);
        }

        if ($request->role == 3 ) {
            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => 1,
                'username' => $request->name,

            ]);
        }

        return redirect()->route('admin1.users.listuser')->with('message1', 'Thêm thành công.');
    }



    // public function edit(string $id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('admins.users.edituser', compact('user'));
    // }
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
public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required|string|min:8',
        'new_password' => 'required|string|min:8|confirmed',
    ], [
        'current_password.required' => 'Mật khẩu hiện tại là bắt buộc.',
        'current_password.string' => 'Mật khẩu hiện tại phải là chuỗi.',
        'current_password.min' => 'Mật khẩu hiện tại phải có ít nhất 8 ký tự.',
        'new_password.required' => 'Mật khẩu mới là bắt buộc.',
        'new_password.string' => 'Mật khẩu mới phải là chuỗi.',
        'new_password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
        'new_password.confirmed' => 'Mật khẩu mới không khớp.',
    ]);

    $user = auth()->user();

    // Kiểm tra mật khẩu hiện tại
    if (!password_verify($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
    }

    // Cập nhật mật khẩu mới
    $user->password = bcrypt($request->new_password);
    $user->save();

    return back()->with('message1', 'Đổi mật khẩu thành công.');
}
public function searchUser(Request $request)
{
    $query = $request->input('name');

    // Tìm kiếm người dùng theo tên
    $listUser = User::where('name', 'LIKE', '%' . $query . '%')->paginate(10);

    return view('admins.users.listuser', compact('listUser')); // Đường dẫn đến view đúng
}
public function showChangePasswordForm()
{
    return view('admins.users.change_password');
}
public function editUser($id)
{
    $user = User::findOrFail($id);
    return view('admins.users.edit_user', compact('user'));
}

//     public function update(Request $request, string $id)
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
//         'role' =>1,
//     ];

//     if ($request->filled('password')) {
//         $data['password'] = bcrypt($request->password);
//     }

//     if ($request->hasFile('image')) {
//         $data['image'] = $request->file('image')->store('images', 'public');
//     }

//     $user->update($data);
//     $check_admin = Admin::where('email', $request->email)->first();

//     if($check_admin){

//         $check_admin->delete();
//     }

//     if($request->role == 1){
//         $check = User::find($id);

//         Admin::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => $check->password,
//             'status' => 1,
//             'username' => $request->name,
//         ]);
//     }

//     return redirect()->route('admin1.users.listuser')->with('message1', 'Cập nhật thành công.');
// }

    /**
     * Remove the specified resource from storage.
     */
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
public function update(Request $request, string $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'address' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'role' => 'required',
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'address' => $request->address,
        'role' => $request->role, // Cập nhật vai trò từ request
    ];

    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('images', 'public');
    }

    $user->update($data);

    return redirect()->route('admin1.users.listuser')->with('message1', 'Cập nhật thành công.');
}
}

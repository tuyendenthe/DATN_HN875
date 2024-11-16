<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function listUser()
{
    $listUser = User::all();
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

        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,

        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        User::create($data);

        return redirect()->route('admin1.users.listuser')->with('success', 'Thêm thành công.');
    }



    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admins.users.edituser', compact('user'));
    }


    public function update(Request $request, string $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'address' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'address' => $request->address,
    ];

    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('images', 'public');
    }

    $user->update($data);

    return redirect()->route('admin1.users.listuser')->with('success', 'Cập nhật thành công.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin1.users.listuser')->with('delete_success', 'Xóa thành công.');
    }
      public function toggleStatus(string $id)
{
    $user = User::findOrFail($id);
    // Đổi trạng thái giữa 'hoạt động' và 'ngưng hoạt động'
    $user->status = ($user->status === '1') ? '2' : '1'; // 1: Hoạt động, 2: Ngưng hoạt động
    $user->save();

    return redirect()->route('admin1.users.listuser')->with('success', 'Trạng thái tài khoản đã được cập nhật.');
}
}

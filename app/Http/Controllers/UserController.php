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
            'role' => 'required|in:1,2',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
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

            'role' => 'required|in:1,2',
        ]);

        $data = $request->except('password', 'password_confirmation');

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        // Cập nhật role
        $data['role'] = $request->role;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $user->update($data);

        return redirect()->route('admin1.users.listuser')->with('update_success', 'Cập nhật thành công.');
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
}

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
            'role' => 'required',

        ]);
        $check = User::where('email',$request->email)->first();
        if($check){
            return redirect()->route('admin1.users.adduser')->with('error', 'Email đã tồn tại.');
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'role' => $request->role ?? 2,
        ]);
        if ($request->hasFile('image')) {
            $data_images = $request->file('image')->store('images', 'public');
            $user->update(['image'=>$data_images]);
        }
        
        if($request->role == 1){
            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => 1,
                'username' => $request->name,
            ]);
        }

      
      
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
        'role' => 'required',
    ]);
  
    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'address' => $request->address,
        'role' =>1,
    ];

    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('images', 'public');
    }
   
    $user->update($data);
    $check_admin = Admin::where('email', $request->email)->first();

    if($check_admin){
        
        $check_admin->delete();
    }

    if($request->role == 1){
        $check = User::find($id);
        
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $check->password,
            'status' => 1,
            'username' => $request->name,
        ]);
    }

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

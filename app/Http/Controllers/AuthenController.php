<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slide;


use App\Models\FlashSale;


class AuthenController extends Controller
{
    public function editUser()
    {
        $user = Auth::user();
        return view('clients.edit_user', compact('user'));
    }
    public function updateUser(Request $req)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Bạn cần đăng nhập để cập nhật thông tin.');
        }

        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Tên không được để trống.',
            'email.required' => 'Email không được để trống.',
            'image.image' => 'File tải lên phải là hình ảnh.',
        ]);

        $user = Auth::user();
        $user->name = $req->name;
        $user->email = $req->email;


        if ($req->hasFile('image')) {
            $path = $req->file('image')->store('images/users');
            $user->image = $path;
        }

        $user->save();

        return redirect()->route('index')->with('message', 'Cập nhật tài khoản thành công');
    }
    public function login(){
        return view('clients.login');
    }


    public function postLogin(Request $req)
    {
       
        $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Password không được để trống',
        ]);


        $user = User::where('email', $req->email)->first();
    
        if ($user) {
            if ($user->status === '2') {
                return redirect()->back()->with([
                    'message' => 'Tài khoản của bạn đã bị ngưng hoạt động. Vui lòng liên hệ quản trị viên.',
                ]);
            }

           
            if (Auth::attempt([
                'email' => $req->email,
                'password' => $req->password,
            ])) {
                session(['user_password' => $req->password]);
           
                if (Auth::user()->role == '1') {
                    return view('admins.dashboard')->with([ 'message' => 'Đăng nhập thành công']);
                } else {
                    $products = (Product::with('category'))->latest()->take(8)->get();
                    $categories = Category::all();
                    $flashSales = FlashSale::with('product')
                        ->where('time_end', '>', \Carbon\Carbon::now('Asia/Ho_Chi_Minh'))
                        ->orderBy('time_end', 'asc')
                        ->limit(4)
                        ->get();
                    $banners = Slide::all();
                    return view('clients.index', compact('products', 'flashSales', 'banners','categories'))->with([
                        'message' => 'Đăng nhập thành công'
                    ]);
                    // return redirect()->route('index');
                }
            }
        }

        return redirect()->back()->with([
            'message' => 'Email hoặc mật khẩu không đúng',
        ]);
    }

    public function logout(){
        Auth::logout();
        session()->flush();
        return redirect()->route('login')->with([
            'message1' => 'Đăng xuất thành công'
        ]);
    }


    public function register(){
        return view('clients.register');
    }

    public function postRegister(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Tên không được để trống.',
            'name.string' => 'Tên phải là chuỗi.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',

            'email.required' => 'Email không được để trống.',
            'email.string' => 'Email phải là chuỗi.',
            'email.email' => 'Email phải có định dạng hợp lệ.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'email.unique' => 'Email đã tồn tại trong hệ thống.',

            'password.required' => 'Mật khẩu không được để trống.',
            'password.string' => 'Mật khẩu phải là chuỗi.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirmed' => 'Mật khẩu không trùng khớp',
        ]);
        $image = 'images/products/adminsczx_UfAaaAvjkq9htIZzCcL5hCrJpPbGqsJscKEt7bk7.jpg';
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'image' => $image,
        ];

        User::create($data);

        return redirect()->route('login')->with([
            'message1' => 'Đăng ký thành công',
        ]);
    }
    public function dashboard(){
        return view('admin.dashboard');
    }


    public function backupDB(){
        // Cấu hình cơ sở dữ liệu
        $databaseName = env('DB_DATABASE');
        $fileName = 'backup_' . date('Y-m-d_H-i-s') . '.sql';
        $filePath = storage_path("app/{$fileName}");

        // Lấy tất cả các bảng
        $tables = DB::select('SHOW TABLES');
        $tables = array_map(fn($table) => array_values((array)$table)[0], $tables);

        $sql = '';

        foreach ($tables as $table) {
            // Thêm lệnh CREATE TABLE
            $createTable = DB::select("SHOW CREATE TABLE `$table`");
            $sql .= $createTable[0]->{'Create Table'} . ";\n\n";

            // Thêm lệnh INSERT INTO
            $rows = DB::select("SELECT * FROM `$table`");
            foreach ($rows as $row) {
                $values = array_map(fn($value) => addslashes($value), (array)$row);
                $values = implode("','", $values);
                $sql .= "INSERT INTO `$table` VALUES ('{$values}');\n";
            }
            $sql .= "\n\n";
        }

        // Lưu kết quả vào file
        Storage::put($fileName, $sql);

        return response()->json(['message' => 'Database backup successful', 'file' => $fileName]);
    }
}

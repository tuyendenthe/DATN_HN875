<?php

namespace App\Http\Controllers;

use App\Http\Requests\Banner_coverRequest;
use App\Models\Slide_cover;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class Banner_coverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function upload_image($imageFile)
    {
        if ($imageFile) {
            $imageName = time() . '-' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('uploads'), $imageName); // Đảm bảo thư mục tồn tại
            return 'uploads/' . $imageName; // Trả về đường dẫn hợp lệ
        }
        return null; // Trả về null nếu không có file
    }
    public function index()
    {
        $banner_covers = Slide_cover::all();
        return view('admins.banner_cover.index', compact('banner_covers'));
    }

    public function clientIndex()
    {
        $banner_covers = Slide_cover::all(); // Lấy dữ liệu từ Slide_cover
        return view('clients.index', compact('banner_covers')); // Truyền biến 'banner_covers' đến view
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.banner_cover.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Banner_coverRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            // Lưu file và lấy đường dẫn
            $path = $request->file('image')->store('images/banner_covers', 'public');
            $data['image'] = $path; // Lưu đường dẫn vào mảng dữ liệu
        } else {
            return redirect()->back()->withErrors(['image' => 'Vui lòng chọn ảnh.'])->withInput();
        }

        // Tạo mới slide với dữ liệu đã lưu
        Slide_cover::create($data);
        return redirect()->route('banner_cover.index')->with('message1', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner_cover = Slide_cover::find($id);
        return view('admins.banner_cover.edit', compact('banner_cover'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Banner_coverRequest $request, string $id)
    {
        $data = $request->all();
        $Banner = Slide_cover::findOrFail($id);

        if ($request->hasFile('image')) {
            // Lưu file mới và lấy đường dẫn
            $data['image'] = $request->file('image')->store('images/banner_covers', 'public');

            // Kiểm tra và xóa file cũ nếu tồn tại
            if (!empty($Banner->image) && file_exists(public_path($Banner->image))) {
                // Xóa file cũ
                unlink(public_path($Banner->image));
            }
        } else {
            // Nếu không có file mới, giữ nguyên giá trị cũ
            $data['image'] = $Banner->image;
        }

        // Cập nhật dữ liệu
        $Banner->update($data);
        return redirect()->route('banner_cover.index')->with('message1', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Slide_cover::find($id);
        $banner->delete();
        return redirect()->route('banner_cover.index')->with('message1', 'Xoa thanh cong');
    }
}

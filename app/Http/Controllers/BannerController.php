<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class BannerController extends Controller
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
        $banners = Slide::all();
        return view('admins.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
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
        Slide::create($data);
        return redirect()->route('banner.index')->with('message1', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Slide::find($id);
        return view('admins.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, string $id)
    {
        $data = $request->all();
        $Banner = Slide::findOrFail($id);

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
        return redirect()->route('banner.index')->with('message1', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Slide::find($id);
        $banner->delete();
        return redirect()->route('banner.index')->with('message1', 'Xoa thanh cong');
    }
}

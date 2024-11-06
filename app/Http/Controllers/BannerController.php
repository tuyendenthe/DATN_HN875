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
            $imageName = time() . '-' . uniqid() . '-' . $imageFile->getClientOriginalExtension();

            $imageFile->move(public_path('uploads'), $imageName);
            return 'uploads/' . $imageName;
        }
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
            $data['image'] = $this->upload_image($request->file('image'));
        }
        Slide::create($data);
        return redirect()->route('banner.index')->with('success', 'Them thanh cong');
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
            $data['image'] = $this->upload_image($request->file('image'));
            if (!empty($Banner->image) && file_exists(public_path($Banner->image))) {
                // Xóa file cũ
                unlink(public_path($Banner->image));
            }
        }

        $Banner->update($data);
        return redirect()->route('banner.index')->with('success', 'Sua thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Slide::find($id);
        $banner->delete();
        return redirect()->route('banner.index')->with('success', 'Xoa thanh cong');
    }
}

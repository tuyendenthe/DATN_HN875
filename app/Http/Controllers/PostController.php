<?php

namespace App\Http\Controllers;

use App\Models\Category_post;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with(['category', 'user'])->get();
        $categories = Category_post::all();
        return view('admins.post.index', compact('posts', 'categories'));
    }


    public function create()
    {
        $categories = Category_post::all();
        return view('admins.post.create', compact('categories'));
    }

    public function store(Request $request)
    {
//        dd($request->all());

        $request->validate([
            'title' => 'required|string|max:255',
            'content_short' => 'required|string|max:500',
            'content' => 'required|string',
            'category_post_id' => 'required|exists:category_posts,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);
        // Chỉ lấy các trường cần thiết
        $data = $request->only(['title', 'content_short', 'content', 'category_post_id']);
        $data['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/posts', 'public');
        }

        Post::create($data);

        return redirect()->route('post.index')->with('message1', 'Thêm bài viết thành công.');
    }

    public function edit(Post $post)
    {
        $categories = Category_post::all();
        return view('admins.post.edit', compact('post', 'categories'));
    }
    public function show(Post $post)
    {
        $post->load(['category', 'user']);
        return view('admins.post.show', compact('post'));
    }
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content_short' => 'required|string|max:500',
            'content' => 'required|string',
            'category_post_id' => 'required|exists:category_posts,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['title', 'content_short', 'content', 'category_post_id']);

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('images/posts', 'public');
        }

        $post->update($data);

        return redirect()->route('post.index')->with('message1', 'Cập nhật bài viết thành công.');
    }

    public function destroy(Post $post)
    {
        // Xóa ảnh nếu có
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();
        return redirect()->route('post.index')->with('message1', 'Xóa bài viết thành công.');
    }


    //client get all blog
    public function clientIndex()
    {
        // Lấy danh sách bài viết với các mối quan hệ
        $posts = Post::with(['category', 'user'])->get();
        return view('clients.blog', compact('posts'));
    }
    //show chi tiết ở client
    public function clientShow(Post $post)
    {
        return view('clients.single_blog', compact('post'));
    }

}

@extends('admins.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Bài Viết</h2>
        <a href="{{ route('post.create') }}" class="btn btn-primary">Thêm bài viết mới</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('update_success'))
        <div class="alert alert-warning">{{ session('update_success') }}</div>
    @endif
    @if (session('delete_success'))
        <div class="alert alert-danger">{{ session('delete_success') }}</div>
    @endif

    @if ($posts->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Mô tả ngắn</th>
                    <th>Danh mục</th>
                    <th>Tên bài viết</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" width="100" alt="Post Image">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $post->content_short }}</td>
                        <td>{{ $post->category->name ?? 'Không có cate' }}</td>
                        <td>{{ $post->user->name ?? 'Không có user User' }}</td>
                        <td>
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No posts available.</p>
    @endif
@endsection

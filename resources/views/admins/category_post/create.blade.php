@extends('admins.master')

@section('content')
    <h2>Thêm mới danh mục</h2>

    <form action="{{ route('category_post.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="detail" class="form-label">Chi tiết bài viết</label>
            <input type="text" class="form-control" id="detail" name="detail" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Mới</button>
        <a href="{{ route('category_post.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection

@extends('admins.master')

@section('content')
    <h2>Thêm danh mục mới</h2>

    <form action="{{ route('category.update',$category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('category.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection

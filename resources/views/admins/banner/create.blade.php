@extends('admins.master')

@section('content')
    <h2>Thêm mới Slide</h2>

    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Ảnh</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="{{ route('banner.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection

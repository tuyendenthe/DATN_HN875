@extends('admins.master')

@section('content')
    <h2>Cập nhật Slide</h2>

    <form action="{{ route('banner_cover.update', $banner_cover->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Ảnh</label>
            <input type="file" class="form-control" id="name" name="image" required>
            <img src="{{ Storage::url($banner_cover->image) }}" alt="" width="100px">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('banner_cover.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection

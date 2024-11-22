@extends('admins.master')

@section('content')
    <h2>Cập nhật Slide</h2>

    <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Image</label>
            <input type="file" class="form-control" id="name" name="image" required>
            <img src="{{ Storage::url($banner->image) }}" alt="" width="100px">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('banner.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection

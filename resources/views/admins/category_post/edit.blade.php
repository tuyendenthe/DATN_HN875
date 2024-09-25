@extends('admins.master')

@section('content')
    <h2>Sửa Category Post</h2>

    <form action="{{ route('category_post.update', $catePost) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Post Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $catePost->name }}" required>
        </div>
        <div class="mb-3">
            <label for="detail" class="form-label">Post Detail</label>
            <input type="text" class="form-control" id="detail" name="detail" value="{{ $catePost->detail }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('category_post.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection

@extends('admins.master')

@section('content')
    <h2>Edit Post</h2>

    <form action="{{ route('post.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="content_short" class="form-label">Short Content</label>
            <textarea class="form-control" id="content_short" name="content_short" required>{{ old('content_short', $post->content_short) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if ($post->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $post->image) }}" width="100" alt="Current Image">
                    <p>Current Image</p>
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="category_post_id" class="form-label">Category_post</label>
            <select class="form-control" id="category_post_id" name="category_post_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_post_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
        <a href="{{ route('post.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

    @if (session('update_success'))
        <div class="alert alert-success mt-3">
            {{ session('update_success') }}
        </div>
    @endif
@endsection

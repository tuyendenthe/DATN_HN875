@extends('admins.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Posts</h2>
        <a href="{{ route('post.create') }}" class="btn btn-primary">Add New Post</a>
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
                    <th>Title</th>
                    <th>Image</th>
                    <th>Content Short</th>
                    <th>Content</th>
                    <th>Category</th>
                    <th>User Name</th>
                    <th>Actions</th>
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
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->category->name ?? 'Không có cate' }}</td>
                        <td>{{ $post->user->name ?? 'Không có user User' }}</td>
                        <td>
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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

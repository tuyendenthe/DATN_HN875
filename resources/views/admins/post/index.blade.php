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
                        <!-- Phân trang -->
{{-- <nav aria-label="...">
    <ul class="pagination justify-content-center">
        @if ($listUser->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link">Previous</a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $listUser->previousPageUrl() }}">Sau</a>
            </li>
        @endif

        @for ($i = 1; $i <= $listUser->lastPage(); $i++)
            @if ($i == $listUser->currentPage())
                <li class="page-item active" aria-current="page">
                    <a class="page-link">{{ $i }}</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $listUser->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor

        @if ($listUser->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $listUser->nextPageUrl() }}">Trước</a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link">Next</a>
            </li>
        @endif
    </ul>
</nav> --}}
    @else
        <p>No posts available.</p>
    @endif
@endsection

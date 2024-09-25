@extends('admins.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Category Posts</h2>
        <a href="{{ route('category_post.create') }}" class="btn btn-primary">Thêm mới Category Post</a>
    </div>

    @if ($categoryPosts->count())
            {{-- thêm thành công --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
             
            {{-- sửa thành công --}}
            @if (session('update_success'))
                <div class="alert alert-warning">
                    {{ session('update_success') }}
                </div>
            @endif

              {{-- xóa thành công --}}
              @if (session('delete_success'))
              <div class="alert alert-danger">
                  {{ session('delete_success') }}
              </div>
          @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Detail</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categoryPosts as $categoryPost)
                    <tr>
                        <td>{{ $categoryPost->id }}</td>
                        <td>{{ $categoryPost->name }}</td>
                        <td>{{ $categoryPost->detail }}</td>
                        <td>
                            <a href="{{ route('category_post.edit', $categoryPost) }}"
                                class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('category_post.destroy', $categoryPost) }}" method="POST"
                                class="d-inline">
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
        <p>Không có cate post nào.</p>
    @endif
@endsection

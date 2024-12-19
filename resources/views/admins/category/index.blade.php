@extends('admins.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Danh mục</h2>
        <a href="{{ route('category.create') }}" class="btn btn-primary">Thêm mới danh mục</a>
    </div>

    @if ($category->count())
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
        {{-- Khôi phục thành công --}}
        @if (session('restore_success'))
            <div class="alert alert-info">
                {{ session('restore_success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if ($category->trashed())
                                <!-- Nút khôi phục -->
                                <form action="{{ route('category.restore', $category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-success"
                                        onclick="return confirm('Bạn có chắc chắn muốn khôi phục danh mục này?')">
                                        Khôi phục
                                    </button>
                                </form>
                            @else
                                <!-- Nút sửa -->
                                <a href="{{ route('category.edit', $category) }}" class="btn btn-sm btn-warning">Sửa</a>

                                <!-- Nút xóa -->
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                                        Xóa
                                    </button>
                                </form>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Không có cate nào.</p>
    @endif
@endsection

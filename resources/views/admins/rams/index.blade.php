@extends('admins.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Danh mục</h2>
        <a href="{{ route('rams.create') }}" class="btn btn-primary">Thêm mới danh mục</a>
    </div>

    @if ($rams->count())
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
                @foreach ($rams as $ram)
                    <tr>
                        <td>{{ $ram->id }}</td>
                        <td>{{ $ram->name }}</td>
                        <td>
                            @if ($ram->id === 1)
                                <!-- Nút sửa (disabled) -->
                                <button class="btn btn-sm btn-warning" disabled>Sửa</button>

                                <!-- Nút xóa (disabled) -->
                                <button class="btn btn-sm btn-danger" disabled>Xóa</button>
                            @else
                                <!-- Nút sửa -->
                                <a href="{{ route('rams.edit', $ram) }}" class="btn btn-sm btn-warning">Sửa</a>

                                <!-- Nút xóa -->
                                <form action="{{ route('rams.destroy', $ram->id) }}" method="POST"
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

@extends('admins.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Slides</h2>
        <a href="{{ route('banner.create') }}" class="btn btn-primary">Thêm mới Slide</a>
    </div>

    @if ($banners->count())
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
                    <th>Image</th>
                    <th>Token</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $banner)
                    <tr>
                        <td>{{ $banner->id }}</td>
                        {{-- <td><img src="{{ asset($banner->image) }}" alt="" width="150px"></td> --}}
                        <td><img src="{{ Storage::url($banner->image) }}" alt="" width="150px"></td>
                        <td>{{ $banner->remember_token }}</td>
                        <td>
                            <a href="{{ route('banner.edit', $banner) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <form action="{{ route('banner.destroy', $banner) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Ban co chac chan xoa?')" class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Không có Banner nào.</p>
    @endif
@endsection

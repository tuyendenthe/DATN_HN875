@extends('admins.master')

@section('content')
    <h2>Thêm mới Ram</h2>

    <form action="{{ route('rams.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="{{ route('rams.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection

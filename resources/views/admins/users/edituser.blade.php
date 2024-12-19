@extends('admins.master')

@section('content')
<div class="container">
    <h2>Cập nhật tài khoản</h2>

    @if (session('message1'))
        <div class="alert alert-success">{{ session('message1') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin1.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" class="form-control" id="password" name="password">
            <small class="form-text text-muted">Để trống nếu không thay đổi mật khẩu.</small>
        </div>

        <div class="form-group">
            <label for="image">Ảnh đại diện:</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <div class="form-group">
            <label for="role">Vai trò:</label>
            <select class="form-control" id="role" name="role" required>
                <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>User</option>
                <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>Admin phụ</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection

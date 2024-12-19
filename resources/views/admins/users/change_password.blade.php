@extends('admins.master')

@section('content')
    <div class="container">
        <h2>Đổi Mật Khẩu</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('message1'))
            <div class="alert alert-success">
                {{ session('message1') }}
            </div>
        @endif

        <form action="{{ route('user.change.password') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="current_password">Mật khẩu hiện tại:</label>
                <input type="password" name="current_password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="new_password">Mật khẩu mới:</label>
                <input type="password" name="new_password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="new_password_confirmation">Nhập lại mật khẩu mới:</label>
                <input type="password" name="new_password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Đổi Mật Khẩu</button>
        </form>
    </div>
@endsection

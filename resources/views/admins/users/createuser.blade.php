@extends('admins.master')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Thêm người dùng</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm người dùng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form action="{{ route('admin1.users.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    Tên:
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12">
                    Email:
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12">
                    Mật khẩu:
                    <input type="password" name="password" class="form-control">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12">
                    Xác nhận mật khẩu:
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="col-12">
                    Quyền tài khoản:
                    <select name="role" class="form-control">
                        @if(auth()->user()->role == 1) <!-- Chỉ Admin tổng mới có thể chọn tất cả -->
                            {{-- <option value="1">Admin</option> --}}
                            <option value="3">Nhân Viên</option>

                        @endif

                        <option value="2" selected>Người dùng</option>

                    </select>
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12">
                    Địa chỉ:
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Thêm người dùng</button>
            </div>
        </form>
    </div>
@endsection

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
                    Ảnh:
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <span class="" style="color: red">{{ $message }}</span>
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
                    Quyền:
                    <select name="role" class="form-control">
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Thêm người dùng</button>
            </div>
        </form>
    </div>
@endsection

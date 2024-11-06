@extends('admins.master')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Chi tiết người dùng</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chi tiết người dùng</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h5>Tên: {{ $user->name }}</h5>
            <h5>Email: {{ $user->email }}</h5>
            <h5>Quyền: {{ $user->role == '1' ? 'Admin' : 'User' }}</h5>
            @if ($user->image)
                <h5>Ảnh:</h5>
                <img src="{{ Storage::url($user->image) }}" alt="{{ $user->name }}" width="100">
            @endif
        </div>
    </div>
    <a href="{{ route('admin1.users.listuser') }}" class="btn btn-secondary mt-3">Quay lại danh sách</a>
</div>
@endsection

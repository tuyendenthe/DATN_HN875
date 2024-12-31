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
        <div class="col-md-4">
            <div class="card" style="border: none;">
                <div class="card-body text-center">
                    @if ($user->image)
                        <h5>Ảnh:</h5>
                        <img src="{{ Storage::url($user->image) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle" style="border: 2px solid #007bff; width: 150px; height: 150px;">
                    @else
                        <h5>Không có ảnh</h5>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">Thông tin người dùng</h5>
                    <h4 class="card-subtitle mb-2 text-muted">Tên: {{ $user->name }}</h4>
                    <h4 class="card-subtitle mb-2 text-muted">Email: {{ $user->email }}</h4>
                    <h4 class="card-subtitle mb-2 text-muted">Địa chỉ: {{ $user->address }}</h4>
                    <h4 class="card-subtitle mb-2 text-muted">Quyền:
                        {{ $user->role == '1' ? 'Admin' : ($user->role == '2' ? 'Người dùng' : 'Nhân Viên') }}
                    </h4>

                </div>
                <a href="{{ route('admin1.users.listuser') }}" class="btn btn-secondary">Quay lại danh sách</a>
            </div>
        </div>
    </div>
</div>
@endsection

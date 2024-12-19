@extends('admins.master')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Bảng</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách người dùng</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quản lí người dùng</h5>

                        <div class="table-responsive">
                            <table id="zero_config" class="table">
                                <div class="d-flex justify-content-end mb-3">
                                    <form action="{{ route('search.user') }}" method="GET" class="form-inline">
                                        <i class="bi bi-search"></i>
                                        <input type="text" placeholder="Tìm kiếm theo tên..." name="name" required class="form-control mr-2" style="width: 15%;">
                                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                    </form>
                                    {{-- <a href="{{ route('admins.users.listuser') }}" class="btn btn-secondary ml-2">Reset Danh Sách</a> --}}
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <a href="{{ route('admin1.users.adduser') }}" class="btn btn-primary">Thêm mới</a>
                                    </div>
                                </div>
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên user</th>
                                        <th>Email</th>
                                        <th>Img</th>
                                        <th>Quyền</th>
                                        <th>Trạng thái</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($listUser) && !empty($listUser))
                                        @foreach ($listUser as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>
                                                <img src="{{ Storage::url($value->image) }}" alt="" width="100">
                                            </td>
                                            <td>
                                                {{ $value->role == '1' ? 'Admin tổng' : ($value->role == '2' ? 'User' : 'Admin phụ') }}
                                            </td>
                                            <td>
                                                <span class="badge {{ $value->status === '1' ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $value->status === '1' ? 'Hoạt động' : 'Ngưng hoạt động' }}
                                                </span>
                                            </td>
                                            <td>
                                                @if(auth()->user()->role == '1' && $value->role == '1')
                                                    {{-- Không thể ngưng Admin tổng --}}
                                                @elseif(auth()->user()->role == '1' && $value->role == '2')
                                                    <form action="{{ route('admin1.users.toggleStatus', $value->id) }}" method="post" style="display:inline;">
                                                        @csrf
                                                        <button class="btn btn-danger" onclick="return confirm('Bạn có muốn ngưng hoạt động tài khoản này không?')">
                                                            {{ $value->status === '1' ? 'Ngưng hoạt động' : 'Mở tài khoản' }}
                                                        </button>
                                                    </form>
                                                @elseif(auth()->user()->role == '3')
                                                    @if($value->role == '2') <!-- Admin phụ có thể ngưng User -->
                                                        <form action="{{ route('admin1.users.toggleStatus', $value->id) }}" method="post" style="display:inline;">
                                                            @csrf
                                                            <button class="btn btn-danger" onclick="return confirm('Bạn có muốn ngưng hoạt động tài khoản này không?')">
                                                                {{ $value->status === '1' ? 'Ngưng hoạt động' : 'Mở tài khoản' }}
                                                            </button>
                                                        </form>
                                                    @endif
                                                @else
                                                    <form action="{{ route('admin1.users.toggleStatus', $value->id) }}" method="post" style="display:inline;">
                                                        @csrf
                                                        <button class="btn btn-danger" onclick="return confirm('Bạn có muốn ngưng hoạt động tài khoản này không?')">
                                                            {{ $value->status === '1' ? 'Ngưng hoạt động' : 'Mở tài khoản' }}
                                                        </button>
                                                    </form>
                                                @endif

                                                <a class="btn btn-info m-1" href="{{ route('admin1.users.detail', $value->id) }}">Xem chi tiết</a>

                                                @if(auth()->user()->role == '1' && $value->role == '3')
                                                    <form action="{{ route('admin1.users.destroy', $value->id) }}" method="post" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa Admin phụ này không?')">Xóa</button>
                                                    </form>
                                                @else
                                                    {{-- Không thể xóa người dùng khác --}}
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center">Không có tài khoản.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Phân trang -->
                <nav aria-label="...">
                    <ul class="pagination justify-content-center">
                        @if ($listUser->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $listUser->previousPageUrl() }}">Sau</a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $listUser->lastPage(); $i++)
                            @if ($i == $listUser->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link">{{ $i }}</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $listUser->url($i) }}">{{ $i }}</a>
                                </li>
                            @endif
                        @endfor

                        @if ($listUser->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $listUser->nextPageUrl() }}">Trước</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <a class="page-link">Next</a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection

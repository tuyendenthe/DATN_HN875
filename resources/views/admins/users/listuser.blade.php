@extends('admins.master')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Tables</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Basic Datatable</h5>

                        <div class="table-responsive">
                            <table id="zero_config" class="table">
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <a href="{{ route('admin1.users.adduser') }}" class="btn btn-primary">Thêm mới</a>

                                    </div>
                                    {{-- <form action="{{route('search.product')}}" method="POST">
                                        @csrf
                                        <input type="text" placeholder="Search anything here.." name="keyw">
                                    </form> --}}
                                </div>
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên user</th>
                                        <th>Email</th>
                                        <th>Img</th>
                                        {{-- <th>Địa chỉ</th> --}}
                                        {{-- <th>Password</th> --}}
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
                                            {{-- <td>{{ $value->address }}</td> --}}
                                            {{-- <td>{{ $value->password }}</td> --}}
                                            <td>
                                                {{ $value->role == '1' ? 'Admin' : 'User' }}
                                            </td>
                                            <td>
                                            <span class="badge {{ $value->status === '1' ? 'badge-success' : 'badge-danger' }}">
                                                {{ $value->status === '1' ? 'Hoạt động' : 'Ngưng hoạt động' }}
                                            </span>
                                        </td>
                                            <td>

                                                {{-- <a class="btn btn-warning m-1" href="{{ route('admin1.users.edit', $value->id) }}">Sửa</a> --}}
                                                <a class="btn btn-info m-1" href="{{ route('admin1.users.detail', $value->id) }}">Xem chi tiết</a>


                                                <form action="{{ route('admin1.users.toggleStatus', $value->id) }}" method="post" style="display:inline;">
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return confirm('Bạn có muốn thay đổi trạng thái tài khoản này không?')">
                                                        {{ $value->status === '1' ? 'Ngưng hoạt động' : 'Mở tài khoản' }}
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center">Không có sản phẩm nào.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
@endsection

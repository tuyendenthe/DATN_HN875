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
                        <h5 class="card-title">Bảng</h5>
                        @if (request()->has('order_id') && request()->order_id != '')
                            <div class="d-flex justify-content-start mb-3">
                                <a href="{{ route('order.list') }}" class="btn btn-secondary">Quay Lại</a>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="zero_config" class="table">
                                <div class="d-flex justify-content-end mb-3">
                                    <form action="{{ route('order.history') }}" method="GET" class="form-inline">
                                        <i class="bi bi-search"></i>
                                        <input type="text" placeholder="Nhập mã đơn hàng..." name="order_id" required
                                            class="form-control mr-2" style="width: 15%;">
                                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                    </form>
                                </div>
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Tên Khách Hàng</th>
                                        {{-- <th>Mô tả</th> --}}
                                        <th>Số Điện Thoại</th>
                                        <th>Email</th>
                                        <th>Note</th>
                                        <th>Đơn vị Giao Hàng</th>
                                        <th>Hình Thức Thanh Toán</th>
                                        <th>Tổng Tiền</th>
                                        <th>Ngày Mua</th>
                                        <th>Trạng Thái Đơn Hàng</th>
                                        <th>Người Cam kết</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($list) && !empty($list))
                                        @foreach ($list as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value->bill_code }}</td>
                                                <td>
                                                    {{ $value->name }}
                                                </td>
                                                {{-- <td>{{ $value->content }}</td> --}}
                                                <td>{{ $value->phone }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->note }}</td>
                                                <td>{{ $value->checkout }}</td>
                                                <td>{{ $value->payment_method }}</td>
                                                <td>{{ $value->total }}</td>
                                                <td>{{ $value->created_at }}</td>
                                                <td>{{ $value->status_name }}</td>
                                                <td>{{ $value->commit }}</td>
                                                <td>


                                                    <a class="btn btn-primary m-1"
                                                        href="{{ route('checkout.detail', $value->bill_code) }}">Chi
                                                        Tiết</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center">Không Có Đơn Hàng Nào.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <!-- Phân trang -->
                            <nav aria-label="...">
                                <ul class="pagination justify-content-center">
                                    @if ($list->onFirstPage())
                                        <li class="page-item disabled">
                                            <a class="page-link">Previous</a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $list->previousPageUrl() }}">Previous</a>
                                        </li>
                                    @endif

                                    @for ($i = 1; $i <= $list->lastPage(); $i++)
                                        @if ($i == $list->currentPage())
                                            <li class="page-item active" aria-current="page">
                                                <a class="page-link">{{ $i }}</a>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $list->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endif
                                    @endfor

                                    @if ($list->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $list->nextPageUrl() }}">Next</a>
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

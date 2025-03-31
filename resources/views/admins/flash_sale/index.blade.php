@extends('admins.master')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Danh sách Flash Sale</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Flash Sale</li>
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
                        <div class="d-flex justify-content-between mb-3">
                            <a href="{{ route('flash_sale.create') }}" class="btn btn-primary">Thêm Mới</a>
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Thuộc tính</th>
                                        <th>Giá niêm yết</th>
                                        <th>Giá sale</th>
                                        <th>Kết Thúc</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($flashSales) && !empty($flashSales))
                                        @foreach ($flashSales as $key => $flashSale)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $flashSale->productVariants->product->name }}</td>
                                                <td>{{ $flashSale->productVariants->ram }}GB - {{ $flashSale->productVariants->memory }}GB</td>
                                                <td>{{ number_format($flashSale->productVariants->price, 0, ',', '.') }} đ</td>
                                                <td>{{ number_format($flashSale->price_sale, 0, ',', '.') }} đ</td>
                                                <td>{{ $flashSale->time_end }}</td>
                                                <td>
                                                    <a href="{{ route('flash_sale.show', $flashSale->id) }}" class="btn btn-info">Sửa</a>
                                                    <form action="{{ route('flash_sale.delete', $flashSale->id) }}" method="post" style="display:inline;">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">Không có biến thể nào.</td>
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

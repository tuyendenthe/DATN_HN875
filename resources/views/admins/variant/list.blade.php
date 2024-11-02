@extends('admins.master')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Danh sách biến thể của sản phẩm: {{ $product->name }}</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Biến thể</li>
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
                            <a href="{{ route('variants.addVariant', $product->id) }}" class="btn btn-primary">Thêm biến thể mới</a>
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên biến thể</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($variants) && !empty($variants))
                                        @foreach ($variants as $key => $variant)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $variant->name }}</td>
                                                <td>{{ number_format($variant->price) }}</td>
                                                <td>{{ number_format($variant->quantity) }}</td>
                                                <td>
                                                    <a href="{{ route('variants.editVariant', $variant->id) }}" class="btn btn-info">Sửa</a>
                                                    <form action="{{ route('variants.deleteVariant', $variant->id) }}" method="post" style="display:inline;">
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

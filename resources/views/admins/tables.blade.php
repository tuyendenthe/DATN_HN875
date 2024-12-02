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
                                        <a href="{{ route('products.addProduct') }}" class="btn btn-primary">Thêm mới</a>
                                        <a href="{{ route('flash_sale.index') }}" class="btn btn-warning">Flash Sale</a>
                                    </div>
                                    <form action="{{route('search.product')}}" method="POST">
                                        @csrf
                                        <input type="text" placeholder="Search anything here.." name="keyw">
                                    </form>
                                </div>
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh</th>
                                        <th>Loại</th>
                                        <th>Mô tả ngắn</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($listProducts) && !empty($listProducts))
                                        @foreach ($listProducts as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>
                                                {{-- <img src="{{ Storage::url($value->image) }}" alt="" width="100"> --}}
                                                <img  src="{{ asset($value->image) }}" alt="" width="100">
                                            </td>
                                            <td>{{ $value->category->name }}</td>
                                            <td>{{ $value->content_short }}</td>
                                            <td>
                                                <a class="btn btn-info m-1" href="{{ route('variants.listVariant', $value->id) }}">Biến thể</a>
                                                <a class="btn btn-primary m-1" href="{{ route('products.updateProduct', $value->id) }}">Sửa</a>
                                                <form action="{{ route('products.deleteProduct', $value->id) }}" method="post" style="display:inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger m-1" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button>
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

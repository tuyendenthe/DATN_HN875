@extends('admins.master')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Sản phẩm</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page"></li>
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
                    <h5 class="card-title">Danh sách sản phẩm</h5>

                    <div class="table-responsive">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <a href="{{ route('products.addProduct') }}" class="btn btn-primary">Thêm mới</a>
                                <a href="{{ route('flash_sale.index') }}" class="btn btn-warning">Flash Sale</a>
                            </div>
                            <form action="{{ route('products.listProduct') }}" method="GET" class="form-inline">
                                <i class="bi bi-search"></i>
                                <input type="text" placeholder="Tìm kiếm..." name="name" class="form-control mr-2" style="width: 50%;">
                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            </form>
                        </div>

                        {{-- <div class="d-flex justify-content-end mb-3"> --}}

                        {{-- </div> --}}

                        <table id="zero_config" class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Loại</th>
                                    <th>Mô tả ngắn</th>
                                    <th>Hành Động</th>
                                    <th>Thuộc tính</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($listProducts) && $listProducts->isNotEmpty())
                                    @foreach ($listProducts as $key => $value)
                                        <tr>
                                            <td>{{ $listProducts->firstItem() + $key }}</td>
                                            <td>{{ $value->name }} </td>
                                            <td>
                                                <img src="{{ asset($value->image) }}" alt="" width="100">
                                            </td>
                                            <td>{{ $value->category->name }}</td>
                                            <td>{{ $value->content_short }}</td>
                                            <td>
                                                <a class="btn btn-primary m-1" href="{{ route('products.updateProduct', $value->id) }}">Sửa</a>
                                                @if ($value->status == 1)
                                                <form action="{{ route('products.deleteProduct', $value->id) }}" method="post" style="display:inline;">
                                                    @csrf
                                                    @method('POST')
                                                    <button class="btn btn-danger m-1" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button>
                                                </form>
                                                @else
                                                <form action="{{ route('products.cancedeleteProduct', $value->id) }}" method="post" style="display:inline;">
                                                    @csrf
                                                    @method('POST')
                                                    <button class="btn btn-danger m-1" onclick="return confirm('Bạn có muốn xóa không?')">Khôi Phục</button>
                                                </form>
                                                @endif

                                            </td>
                                            <td>
                                                <a class="btn btn-default m-1" href="{{ route('products.variants.index', $value->id) }}">Xem</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">Không có sản phẩm nào.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <!-- Phân trang -->
                        <nav aria-label="...">
                            <ul class="pagination justify-content-center">
                                @if ($listProducts->onFirstPage())
                                    <li class="page-item disabled">
                                        <a class="page-link">Previous</a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $listProducts->previousPageUrl() }}">Previous</a>
                                    </li>
                                @endif

                                @for ($i = 1; $i <= $listProducts->lastPage(); $i++)
                                    @if ($i == $listProducts->currentPage())
                                        <li class="page-item active" aria-current="page">
                                            <a class="page-link">{{ $i }}</a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $listProducts->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endif
                                @endfor

                                @if ($listProducts->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $listProducts->nextPageUrl() }}">Next</a>
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
</div>
@endsection

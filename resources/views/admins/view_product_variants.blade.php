<?php //var_dump($data); ?><!---->
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
                        <h5 class="card-title">Danh sách thuộc tính sản phẩm</h5>

                        <div class="table-responsive">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <a href="{{ route('products.variants.create',$productId) }}" class="btn btn-primary">Thêm mới</a>
                                </div>

                            </div>

                            {{-- <div class="d-flex justify-content-end mb-3"> --}}

                            {{-- </div> --}}

                            <table id="zero_config" class="table">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ram</th>
                                    <th>Memory</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Hành Động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (isset($data) && $data->isNotEmpty())
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $key +1  }}</td>
                                            <td>{{ $value->product->name }}</td>
                                            <td>{{ $value->ram }}GB</td>
                                            <td>{{ $value->memory }}GB</td>
                                            <td>{{ $value->quantity }}</td>
                                            <td>{{ $value->price }}</td>
                                            <td>
                                                <a class="btn btn-primary m-1" href="{{ route('products.variants.edit', $value->id) }}">Sửa</a>
                                                <form action="{{ route('products.variants.destroy', $value->id) }}" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa biến thể này?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
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

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

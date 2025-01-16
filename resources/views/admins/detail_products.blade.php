@extends('admins.master')

@section('content')

<main class="p-5">
    <h1 class="text-center ">Chi Tiết Sản Phẩm</h1>
    <h3>1. Thông Tin Chung</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Tên Sản Phẩm</th>
                <th>Hình Ảnh</th>
                <th>Chip</th>
                <th>Màu Sắc</th>
                <th>Kích Thước</th>
                <th>Độ Phân Giải</th>
                <th>Tổng Số Lượng Còn Lại</th>
                <th>Ngày Tạo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $product->name }}</td>
                <td><img src="{{ asset( $product->image) }}" alt="{{ $product->name }}" width="100"></td>
                <td>{{ $product->chip }}</td>
                <td>{{ $product->color }}</td>
                <td>{{ $product->screen }}</td>
                <td>{{ $product->resolution }}</td>
                <td>{{ $product->variants->sum('quantity') }}</td>
                <td>{{ $product->created_at->format('d/m/Y') }}</td>
            </tr>
        </tbody>
    </table>

    <h3>2. Thông Tin Chi Tiết</h3>
    <div class="p-3">
    @foreach ($variants as $key => $variant)
        <h6>Cấu Hình {{ $key + 1 }}</h6>
        <table class="table">
            <thead>
                <tr>
                    <th>Ram</th>
                    <th>Bộ Nhớ</th>
                    <th>Số Lượng Tồn Kho</th>
                    <th>Đã Bán</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $variant->ram }}g</td>
                    <td>{{ $variant->memory }}g</td>
                    <td>{{ $variant->quantity }}</td>
                    <td>{{ $variant->sold }}</td>
                </tr>
            </tbody>
        </table>
    @endforeach
    </div>
</main>

    
@endsection

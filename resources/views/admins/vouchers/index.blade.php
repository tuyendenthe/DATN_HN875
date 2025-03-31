@extends('admins.master')

@section('content')
<div class="container-fluid">
    <h5 class="mb-4">Danh sách Voucher</h5>
    <a href="{{ route('admin1.vouchers.create') }}" class="btn btn-primary mb-3">Thêm Voucher</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã voucher</th>
                <th>Giá giảm</th>
               <th>Điều kiện</th>
                <th>Số lượng</th>
                
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
               
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vouchers as $voucher)
            <tr>
                <td>{{ $voucher->id }}</td>

                <td>{{ $voucher->voucher_code }}</td>
                <td>{{ $voucher->price_sale }}</td>
       <td>{{ $voucher->condition}}</td>
                <td>{{ $voucher->quantity }}</td>
                
                
                <td>{{ $voucher->start_date }}</td>
                <td>{{ $voucher->end_date }}</td>
                
                <td>
                    <a href="{{ route('admin1.vouchers.edit', $voucher->id) }}" class="btn btn-warning">Sửa</a>
                    <form action="{{ route('admin1.vouchers.destroy', $voucher->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('admins.master')

@section('content')
<div class="container-fluid">
    <h5 class="mb-4">Chỉnh sửa Voucher</h5>

    <form action="{{ route('admin1.vouchers.update', $voucher->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="voucher_code">Mã Voucher</label>
            <input type="text" class="form-control" id="voucher_code" name="voucher_code" value="{{ $voucher->voucher_code }}" required>
        </div>
        <div class="form-group">
            <label for="quantity">Số lượng</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $voucher->quantity }}" required>
        </div>
        <div class="form-group">
            <label for="discount_type">Loại giảm giá</label>
            <select class="form-control" id="discount_type" name="discount_type" required>
                <option value="percentage" {{ $voucher->discount_type == 'percentage' ? 'selected' : '' }}>Phần trăm</option>
                <option value="fixed" {{ $voucher->discount_type == 'fixed' ? 'selected' : '' }}>Cố định</option>
            </select>
        </div>
        <div class="form-group">
            <label for="discount_value">Giá trị giảm giá</label>
            <input type="number" step="0.01" class="form-control" id="discount_value" name="discount_value" value="{{ $voucher->discount_value }}" required>
        </div>
        <div class="form-group">
            <label for="price_sale">Giá giảm</label>
            <input type="number" class="form-control" id="price_sale" name="price_sale" value="{{ $voucher->price_sale }}" required>
        </div>
        <div class="form-group">
            <label for="start_date">Ngày bắt đầu</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $voucher->start_date }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">Ngày kết thúc</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $voucher->end_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật Voucher</button>
    </form>
</div>
@endsection

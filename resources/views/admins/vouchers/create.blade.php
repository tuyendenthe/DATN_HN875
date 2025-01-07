@extends('admins.master')

@section('content')
<div class="container-fluid">
    <h5 class="mb-4">Thêm Voucher</h5>

    <form action="{{ route('admin1.vouchers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="voucher_code">Mã Voucher</label>
            <input type="text" class="form-control" id="voucher_code" name="voucher_code" required>
        </div>
        {{-- <div class="form-group">
            <label for="quantity">Số lượng</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div> --}}
        <div class="form-group">
            <label for="quantity">Số lượng</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required min="0" max="99">
        </div>
        
        {{-- <div class="form-group">
            <label for="discount_value">Giá trị giảm giá</label>
            <input type="number" step="0.01" class="form-control" id="discount_value" name="discount_value" required>
        </div> --}}
        <div class="form-group">
            <label for="price_sale">Giá giảm</label>
            <input type="number" class="form-control" id="price_sale" name="price_sale" required min="0" max="99999999">
        </div>
        <div class="form-group">
            <label for="price_sale">Điều Kiện Giảm Giá</label>
            <input type="number" class="form-control" id="condition" name="condition" required min="0" max="99999999">
        </div>
        <div class="form-group">
            <label for="start_date">Ngày bắt đầu</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="form-group">
            <label for="end_date">Ngày kết thúc</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
       
        <button type="submit" class="btn btn-primary">Thêm Voucher</button>
    </form>
</div>
<script>
    // Lấy ngày hiện tại và định dạng cho input date
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('start_date').setAttribute('min', today);
    
    document.getElementById('start_date').addEventListener('change', function() {
        document.getElementById('end_date').setAttribute('min', this.value);
    });
    </script>
@endsection

<?php //dd($detail) ?><!---->
@extends('admins.master')

@section('content')
    <div class="m-3" style="background-color: rgb(230, 230, 230);">
        <header>
            <h3 class="text-center">Chi Tiết Đơn Hàng</h3>
        </header>
        <main>
            <div class="border bg-light m-3">
                <div class="m-3 border p-3">
                    <h5>#1. Thông Tin Đơn Hàng</h5>
                    <div class="my-2">
                        <label for="">Mã Đơn Hàng</label> <br>
                        <input type="text" class="form-control" value="{{ $data->bill_code }}" disabled>
                    </div>
                    <div class="my-2">
                        <label for="">Trạng Thái</label> <br>
                        <input type="text" class="form-control" value="{{ $data->status_name }}" disabled>
                        @if ($data->status == 1)
                            <form action="{{ route('bill.bill_cancel', $data->bill_code) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-danger">Hủy Đơn Hàng</button>
                            </form>
                        @endif
                    </div>
                    <hr>
                    <div class="my-2">
                        <label for="">Tên Khách Hàng</label> <br>
                        <input type="text" class="form-control" value="{{ $data->name }}" disabled>
                    </div>
                    <div class="my-2">
                        <label for="">Số Điện Thoại</label> <br>
                        <input type="text" class="form-control" value="{{ $data->phone }}" disabled>
                    </div>
                    <div class="my-2">
                        <label for="">Địa Chỉ</label> <br>
                        <input type="text" class="form-control" value="{{ $data->address }}" disabled>
                    </div>
                    <div class="my-2">
                        <label for="">Ngày Đặt Hàng</label> <br>
                        <input type="text" class="form-control" value="{{ $data->created_at }}" disabled>
                    </div>
                </div>
                <div class="border m-3">
                    <div class="m-3">
                        <h5>#2. Thông Tin Sản Phẩm</h5>
                        <table class="table my-2">
                            <thead>
                                <tr>
                                    <td>STT</td>
                                    <td>Tên Sản Phẩm</td>
                                    <td>Ảnh</td>
                                    <td>Giá</td>
                                    <td>Số Lượng</td>
                                    <td>Thành Tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->name }}</td> <!-- Sử dụng quan hệ nếu có -->
                                        <td><img src="{{ asset($value->image) }}" alt="" width="100px"></td>
                                        <td>{{ number_format($value->price, 0, ',', '.') }} VNĐ</td>
                                        <td>{{ $value->quantity }}</td>
                                        <td>{{ number_format($value->subtotal, 0, ',', '.') }} VNĐ</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td>Tổng Tiền</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ number_format($data->total, 0, ',', '.') }} VNĐ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

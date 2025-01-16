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
                                <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-danger mt-3">Hủy Đơn Hàng</button>
                                </div>
                            </form>
                        @endif
                    </div>
                    {{-- <hr> --}}

                             <div class="d-flex">
                                <table class="table">
                                     <thead class="bg-info text-light">
                                        <tr>
                                            <td>Tên Người Đặt</td>
                                            <td>Email</td>
                                        </tr>
                                     </thead>
                                     <tbody>
                                        <tr>
                                            <td>{{ $data->name_order }}</td>
                                            <td>{{ $data->mail_order }}</td>
                                        </tr>
                                     </tbody>
                                </table>
                            </div>


                            <div class="d-flex">
                                <table class="table">
                                    <thead class="bg-success text-light">
                                       <tr>
                                           <td>Tên Người Nhận</td>
                                           <td>Số Điện Thoại</td>
                                           <td>Địa Chỉ</td>
                                           <td>Ngày Đặt Hàng</td>

                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                           <td>{{ $data->name_order }}</td>
                                           <td>{{ $data->phone }}</td>
                                           <td>{{ $data->address }}</td>
                                           <td>{{ $data->created_at }}</td>
                                       </tr>
                                    </tbody>
                               </table>
                            {{-- <div class="my-2">
                                <label for="">Tên Người Nhận</label> <br>
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
                            </div> --}}

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
                                    <td>Loại Sản Phẩm</td>
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
                                        <td>{{ $value->variant_name }}</td> <!-- Sử dụng quan hệ nếu có -->
                                        <td><img src="{{ asset($value->image) }}" alt="" width="100px"></td>
                                        <td>{{ number_format($value->price, 0, ',', '.') }} VNĐ</td>
                                        <td>{{ $value->quantity }}</td>
                                        <td>{{ number_format($value->subtotal, 0, ',', '.') }} VNĐ</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td class="text-uppercase">Tổng Tiền Sản Phẩm</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @php
                                        $tong = $data->total +$data->voucher- 25000;
                                    @endphp
                                    <td>{{ number_format($tong , 0, ',', '.') }} VNĐ</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-uppercase">Mã Giảm Giá</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ number_format($data->voucher, 0, ',', '.') }} VNĐ</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-uppercase">Phí Ship</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>25.000.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-uppercase">Tổng Tiền</td>
                                    <td></td>
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

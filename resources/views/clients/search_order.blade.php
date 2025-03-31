@extends('clients.master')

@push('style')

@section('content')
<main>
        <!-- prealoder area start -->
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="first_object"></div>
                    <div class="object" id="second_object"></div>
                    <div class="object" id="third_object"></div>
                </div>
            </div>
        </div>
        <!-- prealoder area end -->
        <!-- breadcrumb area start -->
        <div class="epix-breadcrumb-area">
            <div class="container">
                <h4 class="epix-breadcrumb-title">Kiểm tra đơn hàng</h4>
                <div class="epix-breadcrumb">
                    <ul>
                        <li><a href="{{route('index')}}">Trang chủ</a></li>
                        <li><span>Kiểm tra đơn hàng</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-center " >
        <div class="mt-5  w-50 text-center p-3  " >

            <form action="{{ route('search_order') }}" method="POST">
                @csrf
                <div class="input-group border-primary mb-3">
                    <input type="text" class="form-control border-primary" name="bill_code" placeholder="Nhập mã đơn hàng" aria-label="Nhập mã đơn hàng" aria-describedby="button-addon2">
                    <button class="btn border-primary" type="submit"><i class="fal fa-search"></i></button>
                </div>
            </form>

        </div>

        </div>
        <div class="container d-flex justify-content-center " style="height: 100vh;">
            <div class="mb-3  text-center p-3  " >

                @if ($order)

                <h5>Tìm kiếm đơn hàng : {{ $order->bill_code }}</h3>
                    <div class="m-5">
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Mã vận đơn</td>
                                        <td>Tên khách hàng</td>
                                        <td>Đơn vị giao hàng</td>
                                        <td>Hình thức thanh toán</td>
                                        <td>Ngày đặt hàng</td>
                                        <td>Tổng tiền</td>
                                        <td>Trạng thái đơn hàng</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $order->bill_code }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->checkout }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{  number_format($order->total, 0, ',', '.')}} </td>
                                        <td>{{ $status->status_name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            @else

                <p>Không tìm thấy đơn hàng.</p>
            @endif
        </div>
    </div>
    </main>
@endsection

@push('script')
@endpush

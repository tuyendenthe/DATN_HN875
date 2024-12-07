@extends('admins.master')

@section('content')
@if (session('success'))
    <div id="notification" class="notification alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@forelse($notifications as $notification)
    <li class="list-group-item">
        {{ $notification->message }}
        @if ($notification->bill_code)
        <a href="{{ route('orders.detail', $notification->bill_code) }}" class="btn btn-link">Đọc</a>
    @else
        <span>(Mã đơn hàng không khả dụng)</span>
    @endif
    </li>
@empty
    <li class="list-group-item">Không có thông báo nào.</li>
@endforelse
@endsection

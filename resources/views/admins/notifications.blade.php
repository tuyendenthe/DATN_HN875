@extends('admins.master')

@section('content')
@if (session('success'))
    <div id="notification" class="notification alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div id="notification" class="notification alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

<ul class="list-group">
    @foreach($notifications->sortByDesc('created_at') as $notification)
        <li class="list-group-item">
            {{ $notification->message }}
            @if ($notification->bill_code)
                {{-- <a href="{{ route('orders.detail', $notification->bill_code) }}" class="btn btn-link">Xem Chi Tiết</a> --}}
            @else
                <span>(Mã đơn hàng không khả dụng)</span>
            @endif
        </li>
    @endforeach
</ul>
@endsection

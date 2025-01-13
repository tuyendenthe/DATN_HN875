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

<h1>Notifications</h1>

<ul>
    @foreach($notifications as $notification)
        <li>
            @php
                // Get the bill code from the notification or the related bill
                $billCode = $notification->bill_code;
                if (is_null($billCode)) {
                    $bill = $notification->bill; // Get the related bill
                    $billCode = $bill ? $bill->bill_code : null; // Fetch the bill code if the bill exists
                }
            @endphp

            @if(trim($billCode)) <!-- Ensure bill_code is trimmed and checked -->
                <a href="{{ route('checkout.detail', ['bill_code' => $billCode]) }}">
                    {{ $notification->message }}
                </a>
            @else
                {{ $notification->message }} (Không có mã hóa đơn)
            @endif
            {{-- <a href="{{ route('notifications.read', $notification->id) }}">Đánh dấu là đã đọc</a> --}}
        </li>
    @endforeach
</ul>
@endsection

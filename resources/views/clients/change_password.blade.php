@extends('clients.master')

@section('content')
<style>
    body {
        background-color: #f8f9fa; /* Light background for contrast */
        font-family: 'Arial', sans-serif; /* Clean font */
    }

    .containers {
        background-color: #ffffff; /* White background for the container */
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
        padding: 20px; /* Padding for spacing */
        margin-top: 20px; /* Space from the top */
    }

    h2 {
        color: #007bff; /* Primary color for the title */
        margin-bottom: 20px; /* Space below the title */
    }

    .form-groups {
        margin-bottom: 15px; /* Space between form groups */
    }

    .form-groups label {
        color: #495057; /* Darker label color */
        font-weight: bold; /* Bold labels */
    }

    .form-controls {
        border: 1px solid #ced4da; /* Light border */
        border-radius: 4px; /* Slightly rounded edges */
        padding: 10px; /* Padding inside the input */
        width: 100%; /* Full width */
    }

    .form-controls:focus {
        border-color: #007bff; /* Blue border on focus */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Subtle shadow on focus */
    }

    .btn-primary {
        background-color: #007bff; /* Primary button color */
        border: none; /* No border */
        border-radius: 4px; /* Rounded button */
        padding: 10px 20px; /* Padding for button */
        color: white; /* White text */
        transition: background-color 0.3s ease; /* Smooth transition */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Darker blue on hover */
        cursor: pointer; /* Pointer cursor on hover */
    }

    .text-danger {
        color: #dc3545; /* Red for error messages */
    }
</style>

<div class="container">
    <div class="containers">
        <h2 class="text-center">Đổi Mật Khẩu</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('message1'))
            <div class="alert alert-success">
                {{ session('message1') }}
            </div>
        @endif

        <form action="{{ route('client.change.password') }}" method="POST">
            @csrf
            <div class="form-groups">
                <label for="current_password">Mật khẩu hiện tại:</label>
                <input type="password" name="current_password" class="form-controls" required>
            </div>

            <div class="form-groups">
                <label for="new_password">Mật khẩu mới:</label>
                <input type="password" name="new_password" class="form-controls" required>
            </div>

            <div class="form-groups">
                <label for="new_password_confirmation">Nhập lại mật khẩu mới:</label>
                <input type="password" name="new_password_confirmation" class="form-controls" required>
            </div>

            <button type="submit" class="btn btn-primary">Đổi Mật Khẩu</button>
        </form>
    </div>
</div>
@endsection

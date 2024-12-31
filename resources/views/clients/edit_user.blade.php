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

h4 {
    color: #343a40; /* Darker color for subtitles */
}

.form-groupss label {
    color: #495057; /* Darker label color */
    font-weight: bold; /* Bold labels */
}

.form-controls {
    border: 1px solid #ced4da; /* Light border */
    border-radius: 4px; /* Slightly rounded edges */
    padding: 10px; /* Padding inside the input */
}

.form-controls:focus {
    border-color: #007bff; /* Blue border on focus */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Subtle shadow on focus */
}

.btn-primarys {
    background-color: #007bff; /* Primary button color */
    border: none; /* No border */
    border-radius: 4px; /* Rounded button */
    padding: 10px 20px; /* Padding for button */
    color: white; /* White text */
    transition: background-color 0.3s ease; /* Smooth transition */
}

.btn-primarys:hover {
    background-color: #0056b3; /* Darker blue on hover */
    cursor: pointer; /* Pointer cursor on hover */
}

.text-danger {
    color: #dc3545; /* Red for error messages */
}

img.rounded-circle {
    border: 2px solid #007bff; /* Blue border around image */
    margin-bottom: 15px; /* Space below the image */
}
</style>
<div class="container">
    <h2 class="text-center">Cập nhật tài khoản</h2>

    <div class="row align-items-center">
        <div class="col-md-6 text-center">
            <h4>Ảnh đại diện</h4>
            @if ($user->image)
                <img src="{{ Storage::url($user->image) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle" style="max-width: 80%;">
            @else
                <p>Chưa có ảnh đại diện.</p>
            @endif
        </div>

        <div class="col-md-6">
            <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-groups">
                    <label for="name">Tên:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-groups">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-groups">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}" required>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-groups">
                    <label for="image">Ảnh đại diện:</label>
                    <input type="file" name="image" class="form-control">
                    {{-- @if ($user->image)
                        <img src="{{ Storage::url($user->image) }}" alt="{{ $user->name }}" width="10" class="mt-2">
                    @endif --}}
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection

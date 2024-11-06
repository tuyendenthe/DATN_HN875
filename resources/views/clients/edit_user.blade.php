@extends('clients.master')

@section('content')
<div class="container">
    <h2>Cập nhật tài khoản</h2>

    <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>





        <div class="form-group">
            <label for="image">Ảnh đại diện:</label>
            <input type="file" name="image" class="form-control">
            @if ($user->image)
                <img src="{{ Storage::url($user->image) }}" alt="{{ $user->name }}" width="100">
            @endif
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection

@extends('admins.master')

@section('content')
    <h2>Thêm mới Memory</h2>

    <form action="{{ route('memories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Bộ nhớ</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="{{ route('memories.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection

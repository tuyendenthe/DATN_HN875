@extends('admins.master')

@section('content')
<style>
        /* Cải thiện giao diện của dropdown lọc */
        .filter-container {
            margin-bottom: 20px; /* Khoảng cách dưới */
            text-align: left;
        }

        .filter-container select {
            padding: 8px 15px;
            font-size: 14px;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            color: #333;
            width: 200px;
            transition: background-color 0.3s ease;
        }

        .filter-container select:focus {
            background-color: #e8f0fe;
            border-color: #5b9bd5;
            outline: none;
        }

        .filter-container select option {
            font-size: 14px;
            padding: 5px;
        }

        .table {
            margin-top: 20px;
        }

        .filter-container h2 {
            margin: 0;
            font-size: 1.5rem;
            color: #333;
        }
    </style>

<div class="mb-3">
    <h2>Danh Sách Khách Hàng Đặt Lịch</h2>
</div>

<!-- Thanh lọc bên trái -->
<div class="filter-container">
    <form method="GET" action="{{ route('bookfix.index') }}">
        <select name="status" class="form-control" onchange="this.form.submit()">
            <option value="">Tất cả trạng thái</option>
            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Đang chờ</option>
            <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Đã lên lịch</option>
            <option value="3" {{ request('status') == '3' ? 'selected' : '' }}>Hủy</option>
        </select>
    </form>
</div>

@if ($BookFixs->count()) <!-- Kiểm tra xem có liên hệ nào không -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Số Điện Thoại</th>
            <th>Nội Dung</th>
            <th>ngày Sửa Chữa</th>
            <th>Trạng Thái</th>
            <th>Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($BookFixs as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->content }}</td>
            <td>
                {{ $contact->fix_date ? \Carbon\Carbon::parse($contact->fix_date)->format('d/m/Y') : 'Chưa có lịch' }}
            </td>
            <td>
                @if ($contact->status_id == 1)
                Đang chờ
                @elseif ($contact->status_id == 2)
                Đã lên lịch
                @elseif ($contact->status_id == 3)
                Hủy
                @else
                Chưa xác định
                @endif
            </td>
            <td>
                @if ($contact->status_id == 1)
                <form action="{{ route('bookfix.schedule', $contact) }}" method="POST" class="d-inline schedule-form" id="schedule-form-{{ $contact->id }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-2">
                        <input type="date" name="fix_date" class="form-control" required value="{{ old('fix_date', $contact->fix_date) }}">
                        @error('fix_date')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Lên lịch sửa chữa</button>
                </form>

                <form action="{{ route('bookfix.success', $contact) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-success">Đã lên lịch</button>
                </form>

                <form action="{{ route('bookfix.failed', $contact) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-danger">Hủy</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@else
<p>Không có liên hệ nào.</p>
@endif

@endsection



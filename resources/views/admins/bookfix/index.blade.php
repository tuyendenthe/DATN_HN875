@extends('admins.master')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Danh Sách Khách Hàng Đặt Lịch</h2>
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
                Đang chờ
                @elseif ($contact->status_id == 2)
                Đã lên lịch
                @elseif ($contact->status_id == 3)
                Hủy
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
                    <button type="submit" class="btn btn-sm btn-success">Đã lên lịch</button>
                </form>

                <form action="{{ route('bookfix.failed', $contact) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-danger">Hủy</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Đảm bảo rằng script ở dưới cùng -->
<script>
    function toggleScheduleForm(contactId) {
        var form = document.getElementById('schedule-form-' + contactId);
        // Toggling lớp active để hiển thị/ẩn form
        form.classList.toggle('active');
    }
</script>

@else
<p>Không có liên hệ nào.</p>
@endif

@endsection

<!-- Thêm phần CSS cho việc ẩn/hiện form -->
@section('styles')
    <style>
        /* Ẩn form mặc định */
        .schedule-form {
            display: none;
        }

        /* Khi form được hiển thị */
        .schedule-form.active {
            display: block;
        }
    </style>
@endsection

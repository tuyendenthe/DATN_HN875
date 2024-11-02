@extends('admins.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Danh Sách Liên Hệ</h2>
    </div>

    @if ($contacts->count()) <!-- Kiểm tra xem có liên hệ nào không -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Nội Dung</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->content }}</td>
                        <td>
                            @if ($contact->status_id == 1)
                                Chờ liên lạc
                            @elseif ($contact->status_id == 2)
                                Liên lạc thành công
                            @elseif ($contact->status_id == 3)
                                Không thể liên lạc
                            @else
                                Chưa xác định
                            @endif
                        </td>
                        <td>
                        @if ($contact->status_id == 1) <!-- Kiểm tra nếu status_id là 1 -->
                                {{-- Nút "Đã liên lạc thành công" --}}
                                <form action="{{ route('contact.success', $contact) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH') <!-- Phương thức PATCH để cập nhật -->
                                    <button type="submit" class="btn btn-sm btn-success">Đã liên lạc thành công</button>
                                </form>

                                {{-- Nút "Liên lạc thất bại" --}}
                                <form action="{{ route('contact.failed', $contact) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH') <!-- Phương thức PATCH để cập nhật -->
                                    <button type="submit" class="btn btn-sm btn-danger">Liên lạc thất bại</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Không có liên hệ nào.</p> <!-- Thông báo nếu không có liên hệ -->
    @endif
@endsection

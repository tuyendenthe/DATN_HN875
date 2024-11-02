@extends('admins.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Danh Sách Liên Hệ</h2>
    </div>

    @if ($BookFixs->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Ngày Sửa Chữa</th>
                    <th>Nội Dung</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($BookFixs as $BookFix)
                    <tr>
                        <td>{{ $BookFix->id }}</td>
                        <td>{{ $BookFix->name }}</td>
                        <td>{{ $BookFix->email }}</td>
                        <td>{{ $BookFix->phone }}</td>
                        <!-- <td>{{ $BookFix->fix_date }}</td> -->
                        <td>{{ \Carbon\Carbon::parse($BookFix->fix_date)->format('d/m/Y') }}</td>

                        <td>{{ $BookFix->content }}</td>
                        <td>
                            @if ($BookFix->status_id == 1)
                                Đang chờ xác nhận
                            @elseif ($BookFix->status_id == 2)
                                Xách nhận lịch sửa chữa
                            @elseif ($BookFix->status_id == 3)
                                Lịch sửa bị từ chối
                            @else
                                Chưa xác định
                            @endif
                        </td>
                        <td>
                        @if ($BookFix->status_id == 1) <!-- Kiểm tra nếu status_id là 1 -->
                                {{-- Nút "Đã liên lạc thành công" --}}
                                <form action="{{ route('bookfix.success', $BookFix) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH') <!-- Phương thức PATCH để cập nhật -->
                                    <button type="submit" class="btn btn-sm btn-success">Xách nhận</button>
                                </form>

                                {{-- Nút "Liên lạc thất bại" --}}
                                <form action="{{ route('bookfix.failed', $BookFix) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH') <!-- Phương thức PATCH để cập nhật -->
                                    <button type="submit" class="btn btn-sm btn-danger">Từ chối</button>
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

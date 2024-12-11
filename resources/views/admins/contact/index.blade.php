@extends('admins.master')

@section('content')
<style>
    /* Định dạng cho modal */
    #emailModal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        display: none;
        padding: 20px;
    }

    /* Overlay nền tối */
    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
        display: none;
    }

    /* Định dạng các phần tử trong form */
    #emailModal label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
    }

    #emailModal input[type="text"],
    #emailModal textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }

    #emailModal button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    #emailModal button:hover {
        background-color: #45a049;
    }

    #emailModal .cancel-button {
        background-color: #f44336;
        margin-left: 10px;
    }

    #emailModal .cancel-button:hover {
        background-color: #d32f2f;
    }
</style>

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
            <td>
                {{ $contact->email }}
                <!-- Nút mở modal -->
            </td>

            <!-- Modal nhập nội dung email -->
            <!-- Overlay nền tối -->
            <div id="overlay"></div>

            <!-- Modal nhập nội dung email -->
            <div id="emailModal">
                <form action="{{ route('send.email') }}" method="POST">
                    @csrf
                    <input type="hidden" name="contact_id" id="contact_id">

                    <label for="subject">Tiêu đề:</label>
                    <input type="text" name="subject" id="subject" placeholder="Nhập tiêu đề" required>

                    <label for="content">Nội dung:</label>
                    <textarea name="content" id="content" rows="5" placeholder="Nhập nội dung" required></textarea>

                    <button type="submit">Gửi</button>
                    <button type="button" class="cancel-button" onclick="closeEmailModal()">Hủy</button>
                </form>
            </div>


            <script>
                function openEmailModal(contactId) {
                    document.getElementById('contact_id').value = contactId;
                    document.getElementById('emailModal').style.display = 'block';
                }

                function closeEmailModal() {
                    document.getElementById('emailModal').style.display = 'none';
                }
            </script>

            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->content }}</td>
            <td>
                @if ($contact->status_id == 1)
                Chờ liên lạc
                @elseif ($contact->status_id == 2)
                Liên lạc thành công
                @elseif ($contact->status_id == 3)
                Liên lạc thất bại
                @else
                Chưa xác định
                @endif
            </td>
            <td>
                @if ($contact->status_id == 1) <!-- Kiểm tra nếu status_id là 1 -->

                <button type="button" class="btn btn-sm btn-warning" onclick="openEmailModal({{ $contact->id }})">Gửi Email</button>

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

<script>
    function openEmailModal(contactId) {
        document.getElementById('contact_id').value = contactId;
        document.getElementById('emailModal').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }

    function closeEmailModal() {
        document.getElementById('emailModal').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }
</script>

@else
<p>Không có liên hệ nào.</p> <!-- Thông báo nếu không có liên hệ -->
@endif
@endsection

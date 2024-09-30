<!DOCTYPE html>
<html>
<head>
    <title>Đặt lịch sửa thành công</title>
</head>
<body>
    <h1>Chào {{ $BookFix->name }}</h1>
    <p>Chúc mừng bạn đã thành công đặt lịch sửa chữa hẹn gặp bạn vào ngày {{ \Carbon\Carbon::parse($BookFix->fix_date)->format('d/m/Y') }}.</p>
</body>
</html>

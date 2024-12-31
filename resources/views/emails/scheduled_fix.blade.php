<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Sửa Chữa Đã Được Lên Lịch</title>
</head>
<body>
    <h2>Chào {{ $name }},</h2>
    <p>Chúng tôi xin thông báo rằng lịch sửa chữa của bạn đã được lên lịch vào ngày: <strong>{{ \Carbon\Carbon::parse($fix_date)->format('d/m/Y') }}</strong>.</p>
    <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</p>
</body>
</html>

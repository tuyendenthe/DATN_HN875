<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Khôi phục mật khẩu</title>
</head>
<body>
    <h1>Khôi phục mật khẩu</h1>
    <p>Chào bạn,</p>
    <p>Để khôi phục mật khẩu, hãy nhấp vào liên kết dưới đây:</p>
    <a href="{{ url('password/reset', $token) }}">Khôi phục mật khẩu</a>
    <p>Nếu bạn không yêu cầu khôi phục mật khẩu, hãy bỏ qua email này.</p>
</body>
</html>

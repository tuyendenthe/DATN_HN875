<?php //dd($products) ?><!---->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        /* Reset mặc định */
        body, h1, h2, p, ul, li, a {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body và container */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .thank-you-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            text-align: center;
        }

        /* Card cảm ơn */
        .thank-you-card {
            background: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        .thank-you-card h1 {
            font-size: 2rem;
            color: #4caf50;
            margin-bottom: 20px;
        }

        .thank-you-card p {
            color: #555;
            margin-bottom: 15px;
            font-size: 1rem;
            line-height: 1.5;
        }

        /* Thông tin đơn hàng */
        .order-summary {
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            text-align: left;
        }

        .order-summary h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .order-summary ul {
            list-style: none;
        }

        .order-summary li {
            font-size: 1rem;
            margin: 5px 0;
            color: #333;
        }

        .order-summary strong {
            font-weight: bold;
        }

        /* Button quay về */
        .back-to-home {
            display: inline-block;
            margin-top: 20px;
            background: #4caf50;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .back-to-home:hover {
            background: #45a049;
        }

    </style>
</head>
<body>
<h1>Xin chào {{ $bill->name }}!</h1>
<p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi. Đây là thông tin đơn hàng của bạn:</p>

<h2>Mã đơn hàng: {{ $bill->bill_code }}</h2>
<p><strong>Tổng tiền:</strong> {{ number_format($bill->total, 0, ',', '.') }} VNĐ</p>
<p><strong>Ngày đặt hàng:</strong> {{ $bill->created_at->format('d/m/Y H:i') }}</p>

<h3>Sản phẩm:</h3>
<ul>
    @foreach($products as $product)
        <li>
            <strong>Tên:</strong> {{ $product['product_name'] }} <br>
            <strong>Loại sản phẩm:</strong> {{ $product['variant_name'] }} <br>
            <strong>Số lượng:</strong> {{ $product['quantity'] }} <br>
            <strong>Giá:</strong> {{ number_format($product['price'], 0, ',', '.') }} VNĐ
        </li>
    @endforeach
</ul>

<p>Chúng tôi sẽ liên hệ với bạn để xác nhận đơn hàng. Xin cảm ơn!</p>
</body>
</html>

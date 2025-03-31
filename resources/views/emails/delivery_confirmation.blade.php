<h1>Chào bạn:  {{ $bill->name }},</h1>
<p>Đơn hàng của bạn với mã: {{ $bill->bill_code }} đã được giao thành công.</p>
<h3>Chi tiết sản phẩm:</h3>
<ul>
    @foreach ($products as $product)
        <li>{{ $product['product_name'] }} - Số lượng: {{ $product['quantity'] }}</li>
    @endforeach
</ul>
<p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi!</p>

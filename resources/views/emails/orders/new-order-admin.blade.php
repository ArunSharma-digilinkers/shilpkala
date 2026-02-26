<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f9f9f9; margin: 0; padding: 20px; color: #4C4C4C; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; border-radius: 8px; overflow: hidden; }
        .header { background: #16a34a; padding: 24px; text-align: center; }
        .header h1 { color: #fff; margin: 0; font-size: 22px; }
        .content { padding: 24px; }
        .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin: 16px 0; }
        .info-box { background: #f9f9f9; padding: 12px; border-radius: 6px; }
        .info-box label { font-size: 11px; color: #9C9C9C; text-transform: uppercase; }
        .info-box p { margin: 4px 0 0; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin: 16px 0; }
        th { text-align: left; padding: 8px; border-bottom: 2px solid #eee; font-size: 13px; color: #636363; }
        td { padding: 8px; border-bottom: 1px solid #eee; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Order Received!</h1>
        </div>
        <div class="content">
            <div class="info-grid">
                <div class="info-box">
                    <label>Order Number</label>
                    <p>{{ $order->order_number }}</p>
                </div>
                <div class="info-box">
                    <label>Total</label>
                    <p>₹{{ number_format($order->grand_total, 2) }}</p>
                </div>
                <div class="info-box">
                    <label>Customer</label>
                    <p>{{ $order->billing_name }}</p>
                </div>
                <div class="info-box">
                    <label>Payment</label>
                    <p>{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }} ({{ ucfirst($order->payment_status) }})</p>
                </div>
            </div>

            <h3>Items</h3>
            <table>
                <thead>
                    <tr><th>Product</th><th>Qty</th><th style="text-align:right">Total</th></tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td style="text-align:right">₹{{ number_format($item->total_price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Shipping To</h3>
            <p>
                {{ $order->shipping_name }}<br>
                {{ $order->shipping_address_line_1 }}<br>
                @if ($order->shipping_address_line_2){{ $order->shipping_address_line_2 }}<br>@endif
                {{ $order->shipping_city }}, {{ $order->shipping_state }} - {{ $order->shipping_pincode }}<br>
                Phone: {{ $order->shipping_phone }}
            </p>

            <p style="text-align: center; margin-top: 24px;">
                <a href="{{ url('/admin/orders') }}" style="background: #FC5A6D; color: white; padding: 10px 24px; border-radius: 6px; text-decoration: none; font-weight: bold;">View in Admin</a>
            </p>
        </div>
    </div>
</body>
</html>

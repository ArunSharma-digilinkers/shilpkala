<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f9f9f9; margin: 0; padding: 20px; color: #4C4C4C; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; border-radius: 8px; overflow: hidden; }
        .header { background: #FC5A6D; padding: 24px; text-align: center; }
        .header h1 { color: #fff; margin: 0; font-size: 22px; }
        .content { padding: 24px; }
        .order-info { background: #f9f9f9; border-radius: 6px; padding: 16px; margin: 16px 0; }
        table { width: 100%; border-collapse: collapse; margin: 16px 0; }
        th { text-align: left; padding: 8px; border-bottom: 2px solid #eee; font-size: 13px; color: #636363; }
        td { padding: 8px; border-bottom: 1px solid #eee; font-size: 14px; }
        .totals td { font-weight: bold; border-bottom: none; }
        .footer { text-align: center; padding: 16px; font-size: 12px; color: #9C9C9C; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Order Confirmed!</h1>
        </div>
        <div class="content">
            <p>Dear {{ $order->billing_name }},</p>
            <p>Thank you for your order! We're excited to prepare your handcrafted items.</p>

            <div class="order-info">
                <strong>Order Number:</strong> {{ $order->order_number }}<br>
                <strong>Date:</strong> {{ $order->created_at->format('d M Y, h:i A') }}<br>
                <strong>Payment:</strong> {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}
            </div>

            <h3 style="margin-bottom: 4px;">Items Ordered</h3>
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
                    <tr class="totals">
                        <td colspan="2">Subtotal</td>
                        <td style="text-align:right">₹{{ number_format($order->subtotal, 2) }}</td>
                    </tr>
                    <tr class="totals">
                        <td colspan="2">Shipping</td>
                        <td style="text-align:right">₹{{ number_format($order->shipping_total, 2) }}</td>
                    </tr>
                    @if ($order->discount_total > 0)
                        <tr class="totals" style="color: green;">
                            <td colspan="2">Discount</td>
                            <td style="text-align:right">-₹{{ number_format($order->discount_total, 2) }}</td>
                        </tr>
                    @endif
                    <tr class="totals" style="font-size: 16px;">
                        <td colspan="2">Grand Total</td>
                        <td style="text-align:right">₹{{ number_format($order->grand_total, 2) }}</td>
                    </tr>
                </tbody>
            </table>

            <h3 style="margin-bottom: 4px;">Shipping Address</h3>
            <p style="margin-top: 4px;">
                {{ $order->shipping_name }}<br>
                {{ $order->shipping_address_line_1 }}<br>
                @if ($order->shipping_address_line_2){{ $order->shipping_address_line_2 }}<br>@endif
                {{ $order->shipping_city }}, {{ $order->shipping_state }} - {{ $order->shipping_pincode }}<br>
                Phone: {{ $order->shipping_phone }}
            </p>

            <p>We'll send you another email once your order is shipped. If you have any questions, reply to this email.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Shilpkala. All rights reserved.</p>
        </div>
    </div>
</body>
</html>

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
        .status-badge { display: inline-block; padding: 6px 16px; border-radius: 20px; font-weight: bold; font-size: 14px; }
        .footer { text-align: center; padding: 16px; font-size: 12px; color: #9C9C9C; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Order Update</h1>
        </div>
        <div class="content">
            <p>Dear {{ $order->billing_name }},</p>

            <p>Your order <strong>{{ $order->order_number }}</strong> has been updated.</p>

            <p style="text-align: center; margin: 24px 0;">
                <span style="color: #9C9C9C; text-decoration: line-through;">{{ ucfirst($previousStatus) }}</span>
                &nbsp;&rarr;&nbsp;
                <span class="status-badge" style="background:
                    {{ $order->status === 'processing' ? '#dbeafe; color: #1d4ed8' : '' }}
                    {{ $order->status === 'shipped' ? '#e9d5ff; color: #7c3aed' : '' }}
                    {{ $order->status === 'delivered' ? '#dcfce7; color: #16a34a' : '' }}
                    {{ $order->status === 'cancelled' ? '#fee2e2; color: #dc2626' : '' }}
                ">
                    {{ ucfirst($order->status) }}
                </span>
            </p>

            @if ($order->status === 'shipped')
                <p>Your order is on its way! You can expect delivery within 3-5 business days.</p>
            @elseif ($order->status === 'delivered')
                <p>Your order has been delivered. We hope you love your handcrafted items!</p>
            @elseif ($order->status === 'cancelled')
                <p>Your order has been cancelled. If you didn't request this, please contact us immediately.</p>
            @elseif ($order->status === 'processing')
                <p>We're now preparing your handcrafted items with care. We'll notify you once it ships.</p>
            @endif

            <p>If you have any questions, please reply to this email or contact us at info@shilpkalaworld.com.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Shilpkala. All rights reserved.</p>
        </div>
    </div>
</body>
</html>

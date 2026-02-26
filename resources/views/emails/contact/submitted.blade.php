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
        .message-box { background: #f9f9f9; border-left: 4px solid #FC5A6D; padding: 16px; margin: 16px 0; border-radius: 0 6px 6px 0; }
        .footer { text-align: center; padding: 16px; font-size: 12px; color: #9C9C9C; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Contact Message</h1>
        </div>
        <div class="content">
            <p><strong>From:</strong> {{ $contactMessage->name }} ({{ $contactMessage->email }})</p>
            @if ($contactMessage->phone)
                <p><strong>Phone:</strong> {{ $contactMessage->phone }}</p>
            @endif
            <p><strong>Subject:</strong> {{ $contactMessage->subject }}</p>

            <div class="message-box">
                {!! nl2br(e($contactMessage->message)) !!}
            </div>

            <p style="font-size: 12px; color: #9C9C9C;">
                Received at {{ $contactMessage->created_at->format('d M Y, h:i A') }}
            </p>

            <p style="text-align: center; margin-top: 24px;">
                <a href="{{ url('/admin/contact-messages') }}" style="background: #FC5A6D; color: white; padding: 10px 24px; border-radius: 6px; text-decoration: none; font-weight: bold;">View in Admin</a>
            </p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Shilpkala. All rights reserved.</p>
        </div>
    </div>
</body>
</html>

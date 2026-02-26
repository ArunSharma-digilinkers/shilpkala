<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'order_number', 'status', 'subtotal', 'shipping_total',
        'tax_total', 'discount_total', 'grand_total', 'payment_method',
        'payment_status', 'payment_id', 'billing_name', 'billing_email',
        'billing_phone', 'billing_address_line_1', 'billing_address_line_2',
        'billing_city', 'billing_state', 'billing_pincode',
        'shipping_name', 'shipping_phone', 'shipping_address_line_1',
        'shipping_address_line_2', 'shipping_city', 'shipping_state',
        'shipping_pincode', 'notes',
    ];

    protected function casts(): array
    {
        return [
            'subtotal' => 'decimal:2',
            'shipping_total' => 'decimal:2',
            'tax_total' => 'decimal:2',
            'discount_total' => 'decimal:2',
            'grand_total' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function generateOrderNumber(): string
    {
        return 'SK-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -5));
    }
}

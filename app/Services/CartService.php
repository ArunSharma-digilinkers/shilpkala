<?php

namespace App\Services;

use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    protected string $sessionKey = 'cart';
    protected string $couponKey = 'cart_coupon';

    public function getItems(): array
    {
        return Session::get($this->sessionKey, []);
    }

    public function add(int $productId, int $quantity = 1): void
    {
        $items = $this->getItems();
        $product = Product::findOrFail($productId);

        $key = (string) $productId;
        if (isset($items[$key])) {
            $items[$key]['quantity'] = min($items[$key]['quantity'] + $quantity, $product->stock);
        } else {
            $items[$key] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => (float) ($product->sale_price ?? $product->price),
                'original_price' => (float) $product->price,
                'image' => $product->primary_image_url,
                'quantity' => min($quantity, $product->stock),
                'max_stock' => $product->stock,
            ];
        }

        Session::put($this->sessionKey, $items);
    }

    public function update(int $productId, int $quantity): void
    {
        $items = $this->getItems();
        $key = (string) $productId;

        if (isset($items[$key])) {
            if ($quantity <= 0) {
                unset($items[$key]);
            } else {
                $items[$key]['quantity'] = min($quantity, $items[$key]['max_stock']);
            }
            Session::put($this->sessionKey, $items);
        }
    }

    public function remove(int $productId): void
    {
        $items = $this->getItems();
        unset($items[(string) $productId]);
        Session::put($this->sessionKey, $items);
    }

    public function clear(): void
    {
        Session::forget($this->sessionKey);
        Session::forget($this->couponKey);
    }

    public function count(): int
    {
        return array_sum(array_column($this->getItems(), 'quantity'));
    }

    public function subtotal(): float
    {
        return array_reduce($this->getItems(), function ($total, $item) {
            return $total + ($item['price'] * $item['quantity']);
        }, 0);
    }

    public function applyCoupon(string $code): array
    {
        $coupon = Coupon::where('code', strtoupper($code))->first();

        if (!$coupon) {
            return ['success' => false, 'message' => 'Invalid coupon code.'];
        }

        if (!$coupon->isValid($this->subtotal())) {
            return ['success' => false, 'message' => 'This coupon is not valid for your order.'];
        }

        Session::put($this->couponKey, [
            'id' => $coupon->id,
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
        ]);

        return ['success' => true, 'message' => 'Coupon applied successfully!'];
    }

    public function removeCoupon(): void
    {
        Session::forget($this->couponKey);
    }

    public function getCoupon(): ?array
    {
        return Session::get($this->couponKey);
    }

    public function discount(): float
    {
        $coupon = $this->getCoupon();
        if (!$coupon) return 0;

        $subtotal = $this->subtotal();
        return $coupon['type'] === 'percentage'
            ? round($subtotal * ($coupon['value'] / 100), 2)
            : min($coupon['value'], $subtotal);
    }

    public function shipping(): float
    {
        $threshold = 999;
        $flatRate = 50;
        return $this->subtotal() >= $threshold ? 0 : $flatRate;
    }

    public function total(): float
    {
        return max(0, $this->subtotal() - $this->discount() + $this->shipping());
    }
}

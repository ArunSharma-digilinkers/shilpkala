<?php

namespace App\Services;

use Razorpay\Api\Api;

class RazorpayService
{
    protected Api $api;

    public function __construct()
    {
        $this->api = new Api(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        );
    }

    public function createOrder(float $amount, string $receipt, string $currency = 'INR'): array
    {
        $order = $this->api->order->create([
            'receipt' => $receipt,
            'amount' => (int) ($amount * 100), // Amount in paise
            'currency' => $currency,
        ]);

        return $order->toArray();
    }

    public function verifyPayment(string $razorpayOrderId, string $razorpayPaymentId, string $razorpaySignature): bool
    {
        try {
            $this->api->utility->verifyPaymentSignature([
                'razorpay_order_id' => $razorpayOrderId,
                'razorpay_payment_id' => $razorpayPaymentId,
                'razorpay_signature' => $razorpaySignature,
            ]);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getKey(): string
    {
        return config('services.razorpay.key', '');
    }
}

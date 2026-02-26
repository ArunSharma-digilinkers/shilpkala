<?php

namespace App\Http\Controllers;

use App\Mail\NewOrderAdmin;
use App\Mail\OrderConfirmation;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function __construct(protected CartService $cart) {}

    public function index()
    {
        if (empty($this->cart->getItems())) {
            return redirect()->route('shop.index')->with('error', 'Your cart is empty.');
        }

        return view('checkout.index', [
            'items' => $this->cart->getItems(),
            'subtotal' => $this->cart->subtotal(),
            'discount' => $this->cart->discount(),
            'shipping' => $this->cart->shipping(),
            'total' => $this->cart->total(),
            'coupon' => $this->cart->getCoupon(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'billing_name' => 'required|string|max:255',
            'billing_email' => 'required|email|max:255',
            'billing_phone' => 'required|string|max:20',
            'billing_address_line_1' => 'required|string|max:255',
            'billing_address_line_2' => 'nullable|string|max:255',
            'billing_city' => 'required|string|max:100',
            'billing_state' => 'required|string|max:100',
            'billing_pincode' => 'required|string|max:10',
            'shipping_same' => 'nullable',
            'shipping_name' => 'required_without:shipping_same|nullable|string|max:255',
            'shipping_phone' => 'nullable|string|max:20',
            'shipping_address_line_1' => 'required_without:shipping_same|nullable|string|max:255',
            'shipping_address_line_2' => 'nullable|string|max:255',
            'shipping_city' => 'required_without:shipping_same|nullable|string|max:100',
            'shipping_state' => 'required_without:shipping_same|nullable|string|max:100',
            'shipping_pincode' => 'required_without:shipping_same|nullable|string|max:10',
            'notes' => 'nullable|string|max:1000',
        ]);

        $items = $this->cart->getItems();
        if (empty($items)) {
            return redirect()->route('shop.index')->with('error', 'Your cart is empty.');
        }

        // If shipping same as billing
        if ($request->has('shipping_same')) {
            $validated['shipping_name'] = $validated['billing_name'];
            $validated['shipping_phone'] = $validated['billing_phone'];
            $validated['shipping_address_line_1'] = $validated['billing_address_line_1'];
            $validated['shipping_address_line_2'] = $validated['billing_address_line_2'];
            $validated['shipping_city'] = $validated['billing_city'];
            $validated['shipping_state'] = $validated['billing_state'];
            $validated['shipping_pincode'] = $validated['billing_pincode'];
        }

        $order = DB::transaction(function () use ($validated, $items) {
            $subtotal = $this->cart->subtotal();
            $discount = $this->cart->discount();
            $shipping = $this->cart->shipping();
            $total = $this->cart->total();

            $order = Order::create([
                'user_id' => auth()->id(),
                'order_number' => Order::generateOrderNumber(),
                'status' => 'pending',
                'subtotal' => $subtotal,
                'shipping_total' => $shipping,
                'discount_total' => $discount,
                'grand_total' => $total,
                'payment_method' => 'cod',
                'payment_status' => 'pending',
                'billing_name' => $validated['billing_name'],
                'billing_email' => $validated['billing_email'],
                'billing_phone' => $validated['billing_phone'],
                'billing_address_line_1' => $validated['billing_address_line_1'],
                'billing_address_line_2' => $validated['billing_address_line_2'] ?? null,
                'billing_city' => $validated['billing_city'],
                'billing_state' => $validated['billing_state'],
                'billing_pincode' => $validated['billing_pincode'],
                'shipping_name' => $validated['shipping_name'],
                'shipping_phone' => $validated['shipping_phone'] ?? null,
                'shipping_address_line_1' => $validated['shipping_address_line_1'],
                'shipping_address_line_2' => $validated['shipping_address_line_2'] ?? null,
                'shipping_city' => $validated['shipping_city'],
                'shipping_state' => $validated['shipping_state'],
                'shipping_pincode' => $validated['shipping_pincode'],
                'notes' => $validated['notes'] ?? null,
            ]);

            foreach ($items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'product_name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['price'],
                    'total_price' => $item['price'] * $item['quantity'],
                ]);

                // Decrement stock
                Product::where('id', $item['product_id'])
                    ->decrement('stock', $item['quantity']);
            }

            // Increment coupon usage
            $coupon = $this->cart->getCoupon();
            if ($coupon) {
                Coupon::where('id', $coupon['id'])->increment('used_count');
            }

            return $order;
        });

        $this->cart->clear();

        // Send emails
        try {
            $order->load('items');
            Mail::to($order->billing_email)->send(new OrderConfirmation($order));
            Mail::to(config('mail.from.address', 'admin@shilpkala.com'))->send(new NewOrderAdmin($order));
        } catch (\Exception $e) {
            // Silently fail - order is still created
        }

        return redirect()->route('checkout.confirmation', $order->order_number);
    }

    public function confirmation(string $orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)->with('items')->firstOrFail();

        return view('checkout.confirmation', compact('order'));
    }
}

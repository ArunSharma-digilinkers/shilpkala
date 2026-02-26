<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(protected CartService $cart) {}

    public function index()
    {
        return view('cart.index', [
            'items' => $this->cart->getItems(),
            'subtotal' => $this->cart->subtotal(),
            'discount' => $this->cart->discount(),
            'shipping' => $this->cart->shipping(),
            'total' => $this->cart->total(),
            'coupon' => $this->cart->getCoupon(),
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'integer|min:1|max:100',
        ]);

        $this->cart->add($request->product_id, $request->get('quantity', 1));

        if ($request->ajax()) {
            return response()->json([
                'count' => $this->cart->count(),
                'message' => 'Product added to cart!',
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:0',
        ]);

        $this->cart->update($request->product_id, $request->quantity);

        return redirect()->route('cart.index');
    }

    public function remove(Request $request)
    {
        $this->cart->remove($request->product_id);

        return redirect()->route('cart.index');
    }

    public function applyCoupon(Request $request)
    {
        $request->validate(['coupon_code' => 'required|string']);

        $result = $this->cart->applyCoupon($request->coupon_code);

        return redirect()->route('cart.index')->with(
            $result['success'] ? 'success' : 'error',
            $result['message']
        );
    }

    public function removeCoupon()
    {
        $this->cart->removeCoupon();

        return redirect()->route('cart.index')->with('success', 'Coupon removed.');
    }
}

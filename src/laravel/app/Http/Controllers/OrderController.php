<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $userId = optional(Auth::user())->id;
        $status = 0;
        $order = Order::create([
            'user_id' => $userId,
            'fullname' => $request->input('fullname'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'status' => $status,
            'total' => $request->input('total'),
        ]);

        if ($request->session()->has('buynow')) {
            $buynow = $request->session()->get('buynow', []);
            foreach ($buynow as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }
            $request->session()->forget('buynow');
        }

        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart', []);
            foreach ($cart as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }
            $request->session()->forget('cart');
        }

        // Return a response or redirect as needed
        return response()->json(['message' => 'Order created successfully']);
    }

}
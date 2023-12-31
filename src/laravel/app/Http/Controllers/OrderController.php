<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function createOrder(Request $request, $user)
    {
        $status = 0;
        $order = Order::create([
            'user_id' => $user->id,
            'fullname' => $request->input('fullname'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'status' => $status,
            'total' => $request->input('total'),
        ]);

        $cart = $request->session()->get('cart', []);
        foreach ($cart as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Clear the cart in the session
        $request->session()->forget('cart');

        // Return a response or redirect as needed
        return response()->json(['message' => 'Order created successfully']);
    }
}
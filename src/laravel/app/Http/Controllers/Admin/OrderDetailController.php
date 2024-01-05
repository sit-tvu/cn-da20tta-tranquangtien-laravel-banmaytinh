<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderDetailController extends Controller
{
    public function show(Order $order)
    {
        $orderDetails = $order->orderDetails;

        return view('admin.orders.orderdetail', compact('order', 'orderDetails'));
    }
}
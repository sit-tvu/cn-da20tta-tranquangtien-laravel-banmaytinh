<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $dateA = $request->input('dateA', null);
        $dateB = $request->input('dateB', null);

        $orders = $this->filterData($dateA, $dateB);

        return view('admin.orders.index', ['orders' => $orders, 'dateA' => $dateA, 'dateB' => $dateB]);
    }

    private function filterData($dateA, $dateB)
    {
        $dateA = Carbon::parse($dateA)->startOfDay();
        $dateB = Carbon::parse($dateB)->endOfDay();
        if (($dateA && $dateB) && ($dateA <= $dateB)) {
            return Order::whereBetween('created_at', [$dateA, $dateB])->get();
        } else {
            return Order::all();
        }
    }

    public function confirmOrder($id)
{
    $order = Order::findOrFail($id);

    if ($order->status == 0) {
        $order->status = 1;
        $order->save();

        return redirect()->back()->with('success', 'Đơn hàng đã được xác nhận.');
    }

    if ($order->status == 1) {
        $order->status = 2;
        $order->save();

        return redirect()->back()->with('success', 'Đơn hàng đã được xác nhận.');
    }


    return redirect()->back()->with('error', 'Không thể xác nhận đơn hàng.');
}

public function cancelOrder($id)
{
    $order = Order::findOrFail($id);

    if ($order->status != 3 ) {
        $order->status = 3;
        $order->save();

        return redirect()->back()->with('success', 'Đơn hàng đã hủy.');
    }

    return redirect()->back()->with('error', 'Không thể xác nhận đơn hàng.');
}

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
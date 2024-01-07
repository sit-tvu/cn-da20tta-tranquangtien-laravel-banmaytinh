<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
class DashboardController extends Controller
{
    //
    public function index(){
        return view("admin.dashboard");
    }

    public function Count()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        
        $orderCount = Order::count();
        $completedOrderCount = Order::where('status', 2)->count();
        $cancelOrderCount = Order::where('status', 3)->count();
        $total = Order::where('status', 2)->sum('total');

        $currentMonth_orderCount = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->count();
        $currentMonth_completedOrderCount = Order::where('status', 2)
        ->whereBetween('updated_at', [$startOfMonth, $endOfMonth])
        ->count();
        $currentMonth_cancelOrderCount = Order::where('status', 3)
        ->whereBetween('updated_at', [$startOfMonth, $endOfMonth])
        ->count();
        $currentMonth_total = Order::where('status', 2)
        ->whereBetween('updated_at', [$startOfMonth, $endOfMonth])
        ->sum('total');
        
        return view('admin.dashboard', compact('orderCount','completedOrderCount','cancelOrderCount','total',
        'currentMonth_orderCount','currentMonth_completedOrderCount','currentMonth_cancelOrderCount'));
    }
}
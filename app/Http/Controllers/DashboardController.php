<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalCustomers' => Customer::count(),
            'totalProducts' => Product::count(),
            'totalOrders' => Order::count(),

            'latestCustomers' => Customer::latest()->take(5)->get(),
            'latestOrders' => Order::with('customer', 'product')->latest()->take(5)->get(),
        ]);
    }
}
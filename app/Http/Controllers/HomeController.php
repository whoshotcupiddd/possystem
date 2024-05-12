<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve necessary data
        $totalProducts = Product::count();
        $totalRevenue = Order::sum('price');
        $totalOrders = Order::count();
        $totalSales = 0; // Add your logic to calculate total sales

        // Fetch recent orders
        $recentOrders = Order::latest()->take(5)->get();

        // Example data for graph
        $dailySales = [
            '2024-05-01' => 200,
            '2024-05-02' => 300,
            '2024-05-03' => 400,
            // Add more data as needed
        ];

        // Pass data to the view
        return view('index', compact('totalProducts', 'totalRevenue', 'totalOrders', 'totalSales', 'recentOrders', 'dailySales'));
    }
}

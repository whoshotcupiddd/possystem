<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Order;
use App\Models\Product;
=======
>>>>>>> origin/adminSystem
use Illuminate\Http\Request;

class HomeController extends Controller
{
<<<<<<< HEAD
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
=======
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
>>>>>>> origin/adminSystem
    }
}

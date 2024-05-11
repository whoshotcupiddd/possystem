<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order; // Add this line at the top

class OrderController extends Controller
{
    public function index()
    {
        // Retrieve orders from the database
        $products = Product::all();

        // Pass the orders data to the view for displaying
        return view('orders.order', compact('products'));
    }

    public function proceedToPayment(Request $request)
    {
        if ($request->isMethod('post')) {
            $orders = session()->get('orders', []);

            foreach ($orders as $order) {
                // Save orders to the database
                Order::create([
                    'product_name' => $order['product_name'],
                    'price' => $order['price'],
                ]);
            }

            // Clear the session
            session()->forget('orders');

            return redirect()->route('payment')->with('success', 'Order placed successfully.');
        } else {
            return redirect()->route('orders.index')->with('error', 'Invalid request method.');
        }
    }
}

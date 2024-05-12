<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order; // Add this line at the top
use App\Models\Sale;
use SimpleXMLElement;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve orders from the database
        $products = Product::all();

        // Check if the request contains a specific parameter indicating that the user clicked the "View Order" button
    if ($request->has('view_orders')) {
        // Load orders from XML file
        $orders = $this->loadOrdersFromXML();
        // Return the view displaying the orders
        return view('orders.index', compact('orders'));
    }

    // If the "View Order" button is not clicked, return the view to order products
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

    private function loadOrdersFromXML()
{
    $xmlFile = public_path('xml/orders.xml');
    $xmlData = file_get_contents($xmlFile);
    $orders = [];

    if ($xmlData) {
        $xml = new SimpleXMLElement($xmlData);
        foreach ($xml->order as $order) {
            $orderData = [
                'id' => (int)$order->id,
                'product' => [
                    'name' => (string)$order->product->name,
                    'price' => (float)$order->product->price
                ],
                'quantity' => (int)$order->quantity,
                'total_price' => (float)$order->total_price
            ];
            $orders[] = $orderData;
        }
    }

    return $orders;
}


    public function confirmOrder(Request $request)
    {
        // Your existing code to process the order

        // Calculate total price of the order
        $totalPrice = $this->calculateTotalPrice($orderItems);

        // Save the total price as a sale in the database
        Sale::create([
            'amount' => $totalPrice
        ]);
    }

    // Inside your OrderController class
public function history()
{
    // Retrieve order history from the database
    $orders = Order::all(); // Assuming Order is your model for orders

    // Return the view to display the order history
    return view('orders.history', compact('orders'));
}

}

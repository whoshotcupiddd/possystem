<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function showPaymentForm(Request $request)
    {
        $productIdsString = $request->query('productIds');
        $productPricesString = $request->query('productPrices');

        // Convert the comma-separated strings into arrays
        $productIds = explode(',', $productIdsString);
        $productPrices = explode(',', $productPricesString);

        return view('payment', [
            'productIds' => $productIds,
            'productPrices' => $productPrices,
        ]);
    }



    public function processPayment(Request $request)
    {
        // // Validate the request
        // $validatedData = $request->validate([
        //     'card_number' => 'required|regex:/^\d{4}-\d{4}-\d{4}-\d{4}$/',
        //     'expiration_date' => 'required|regex:/^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})$/',
        //     'cvv' => 'required|digits:3',
        //     'cardholder_name' => 'required|string',
        // ]);

        $productIdsString = $request->input('productIds');
        $productPricesString = $request->input('productPrices');

        // Decode JSON strings into arrays
        $productIds = json_decode($productIdsString, true);
        $productPrices = json_decode($productPricesString, true);

        // Sum up all the prices
        $totalPrice = array_sum($productPrices);

        // Fetch product names using product IDs
        $productNames = [];
        foreach ($productIds as $productId) {
            $product = Product::find($productId);
            if ($product) {
                $productNames[] = $product->name;
            }
        }
        // Concatenate product names with IDs
        $productNameString = implode(', ', array_map(function ($id, $name) {
            return "$name";
        }, $productIds, $productNames));
        // Create a new order record
        $order = new Order();
        $order->product_name = $productNameString;
        $order->price = $totalPrice;
        $order->save();
        // Simulate creating a new payment record
        $paymentData = [
            'card_number' => $request->string('card_number'),
            'expiration_date' => $request->string('expiration_date'),
            'cvv' => $request->string('cvv'),
            'cardholder_name' => $request->string('cardholder_name'),        
        ];

        // Create a new payment record
        Payment::create($paymentData);
        // Redirect to the index page with success message
        return redirect()->route('index')->with('success', 'Payment successful!');
    }

}

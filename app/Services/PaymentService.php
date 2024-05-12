<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;

class PaymentService
{
    public function processPayment(array $validatedData, array $productIds, array $productPrices): void
    {
        $amountPaid = isset($validatedData['amount_paid']) ? number_format($validatedData['amount_paid'], 2) : null;
        $change = isset($validatedData['change']) ? number_format($validatedData['change'], 2) : null;

        $totalPrice = array_sum($productPrices);

        if ($validatedData['payment_method'] == 'credit_card') {
            $amountPaid = $totalPrice;
        } else {
            $amountPaid = $validatedData['amount_paid'];
        }

        $productNames = [];
        foreach ($productIds as $productId) {
            $product = Product::findOrNew($productId);
            if ($product) {
                $productNames[] = $product->name;
            }
        }
        $productNameString = implode(', ', array_map(function ($id, $name) {
            return "$name";
        }, $productIds, $productNames));

        $order = new Order();
        $order->product_name = $productNameString;
        $order->price = $totalPrice;
        $order->save();

        $paymentData = [
            'payment_method' => $validatedData['payment_method'],
            'card_number' => $validatedData['card_number'],
            'expiration_date' => $validatedData['expiration_date'],
            'cvv' => $validatedData['cvv'],
            'cardholder_name' => $validatedData['cardholder_name'], 
            'order_id' => $order->id,
            'amount_paid' => $amountPaid,
            'change' => $change,      
        ];
        Payment::create($paymentData);
    }

    public function getReceipts(): array
    {
        $payments = Payment::all();

        foreach ($payments as $payment) {
            $order = Order::findOrNew($payment->order_id); 
            $payment->total_price = $order->price; 
            $payment->ordered_items = $order->product_name; 
        }

        return $payments->toArray();
    }
}
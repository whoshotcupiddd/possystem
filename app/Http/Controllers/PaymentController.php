<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment');
    }

    public function processPayment(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'card_number' => 'required|regex:/^\d{4}-\d{4}-\d{4}-\d{4}$/',
            'expiration_date' => 'required|regex:/^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})$/',
            'cvv' => 'required|digits:3',
            'cardholder_name' => 'required|string',
        ]);

        // Create a new payment record
        $payment = Payment::create($validatedData);

        // Redirect to the index page
        return redirect()->route('index')->with('success', 'Payment successful!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Models\Product;
use App\Models\Payment;
use App\Models\Order;
use SimpleXMLElement;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function showPaymentForm(Request $request)
    {
        $productIdsString = $request->query('productIds');
        $productPricesString = $request->query('productPrices');

        $productIds = explode(',', $productIdsString);
        $productPrices = explode(',', $productPricesString);

        return view('payment', [
            'productIds' => $productIds,
            'productPrices' => $productPrices,
        ]);
    }

    public function processPayment(Request $request)
    {
        $validatedData = $request->validate([
            'payment_method' => 'required|in:credit_card,cash',
            'card_number' => ['nullable', 'required_if:payment_method,credit_card', 'regex:/^\d{4}-\d{4}-\d{4}-\d{4}$/'],
            'expiration_date' => ['nullable', 'required_if:payment_method,credit_card', 'regex:/^(0[1-9]|1[0-2])\/?\d{2}$/'],
            'cvv' => ['nullable', 'required_if:payment_method,credit_card', 'digits:3'],
            'cardholder_name' => ['nullable', 'required_if:payment_method,credit_card', 'string'],
            'amount_paid' => ['nullable', 'required_if:payment_method,cash', 'numeric', 'min:0'],
            'change' => ['nullable', 'required_if:payment_method,cash', 'numeric', 'min:0'],
        ], [
            'payment_method.required' => 'Please select a payment method.',
            'card_number.regex' => 'Please enter a valid credit card number.',
            'expiration_date.regex' => 'Please enter a valid expiration date in MM/YY format.',
            'cvv.digits' => 'The CVV must be a 3-digit number.',
            'cardholder_name.string' => 'Please enter a valid name.',
            'amount_paid.numeric' => 'Please enter a valid numeric amount.',
            'amount_paid.min' => 'The amount paid must be at least :min.',
            'change.numeric' => 'Please enter a valid numeric change amount.',
        ]);

        $productIds = json_decode($request->input('productIds'), true);
        $productPrices = json_decode($request->input('productPrices'), true);

        $this->paymentService->processPayment($validatedData, $productIds, $productPrices);

        return redirect()->route('index')->with('success', 'Payment successful!');
    }

    public function receipt()
    {
        $payments = Payment::all();

        foreach ($payments as &$payment) { 
            $order = Order::find($payment['order_id']); 
            $payment['total_price'] = $order->price; 
            $payment['ordered_items'] = $order->product_name; 
        }

        return view('receipt', compact('payments'));
    }

    public function generateXmlFile()
    {
        $payments = Payment::all();

        $xml = new SimpleXMLElement('<payments></payments>');

        foreach ($payments as $payment) {
            $paymentXml = $xml->addChild('payment');
            $paymentXml->addChild('id', $payment->id);
            $paymentXml->addChild('payment_method', $payment->payment_method);
            $paymentXml->addChild('card_number', $payment->card_number);
            $paymentXml->addChild('expiration_date', $payment->expiration_date);
            $paymentXml->addChild('cvv', $payment->cvv);
            $paymentXml->addChild('cardholder_name', $payment->cardholder_name);
            $paymentXml->addChild('order_id', $payment->order_id);
            $paymentXml->addChild('amount_paid', $payment->amount_paid);
            $paymentXml->addChild('change', $payment->change);
            $paymentXml->addChild('created_at', $payment->created_at);
        }

        $xmlString = $xml->asXML();
        $filePath = public_path('storage/payments.xml');
        file_put_contents($filePath, $xmlString);
    }
}

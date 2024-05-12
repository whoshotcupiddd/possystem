@extends('layouts.app')

@section('title', 'Receipt')

@section('content')
    <h1>Receipt</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($payments as $payment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Order Details</h5>
                            <p class="card-text">Order ID: {{ $payment->order_id }}</p>
                            <p class="card-text">Date: {{ $payment->created_at }}</p> 
                            <hr>
                            <h5 class="card-title">Ordered Items</h5>
                            <ul class="list-group">
                                @foreach (explode(',', $payment->ordered_items) as $productName)
                                    <li class="list-group-item">{{ $productName }}</li>
                                @endforeach
                            </ul>
                            <hr>
                            <p class="card-text">Total Price: ${{ $payment->total_price }}</p>
                            <p class="card-text">Payment Method: {{ $payment->payment_method }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

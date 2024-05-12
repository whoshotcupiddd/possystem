@extends('layouts.app')

@section('title', 'Order History')

@section('content')
<div class="container">
    <h1>Order History</h1>
    @if(count($orders) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                   
                    <th>Total Price</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->product_name }}</td>
                        
                        <td>${{ $order->price }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No orders found.</p>
    @endif
</div>
@endsection

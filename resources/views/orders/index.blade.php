@extends('layouts.app')

@section('title', 'Order List')

@section('content')
<div class="container">
    <h1>Order List</h1>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('orders.index') }}" class="btn btn-primary mb-3">Back to Order page</a>
            @if(count($orders) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order['id'] }}</td>
                                <td>{{ $order['product']['name'] }}</td>
                                <td>{{ $order['product']['price'] }}</td>
                                <td>{{ $order['quantity'] }}</td>
                                <td>{{ $order['total_price'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No orders found.</p>
            @endif
        </div>
    </div>
</div>
@endsection

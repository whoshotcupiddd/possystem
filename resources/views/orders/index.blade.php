@extends('layouts.app')

@section('title', 'Order List')

@section('content')
<style>
        .main--title {
        color: rgba(113,99,186,255);
        padding-bottom: 10px;
        font-size: 30px;
    }
    .tabular--wrapper{
    background:#fff;
    margin-top:1rem;
    border-radius:10px;
    padding:2rem;
    }
    .custom-button {
        display: inline-block;
        padding: 10px 20px;
        margin-bottom:10px;
        background-color: rgba(113, 99, 186, 255);
        color: #fff;
        text-decoration: none;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .custom-button:hover {
        background-color: rgba(93, 79, 166, 255);
        color: #fff;
        text-decoration: none;
    }

    .table--container{
        width:100%;
    }

    table{
        width:100%;
        border-collapse:collapse;
    }

    thead{
        background:rgba(113,99,186,255);
        color:#fff;
    }
    th{
        padding:20px;
        text-align:left;
    }

    tbody{
        background:#f2f2f2;
    }
    td{
        padding:20px;
        font-size:14px;
        color:#333;
    }

    tr:nth-child(even){
        background:#fff;
    }
    </style>
    
<!-- <div class="container"> -->
<div class="tabular--wrapper">
<h3 class="main--title">Order List</h3>
    
    <div class="table--container">
    <a href="{{ route('orders.index') }}" class="custom-button">Back to Order page</a>

            @if(count($orders) > 0)
            <table>
                <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                    
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
                </thead>
            </table>
            @else
                <p>No orders found.</p>
            @endif
        
    </div>
</div>
@endsection

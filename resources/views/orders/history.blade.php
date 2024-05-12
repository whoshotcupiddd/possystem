@extends('layouts.app')

@section('title', 'Order History')

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
        padding:15px;
        text-align:left;
    }

    tbody{
        background:#f2f2f2;
    }
    td{
        padding:15px;
        font-size:14px;
        color:#333;
    }

    tr:nth-child(even){
        background:#fff;
    }
    </style>
<!-- <div class="container"> -->
<div class="tabular--wrapper">
    <h3 class="main--title">Order History</h3>
    @if(count($orders) > 0)
        <div class="table--container">
        <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Total Price</th>
                <th>Order Date</th>
                </tr>
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
            </thead>
        </table>
        </table>
    @else
        <p>No orders found.</p>
    @endif
</div>
@endsection

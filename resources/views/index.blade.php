<!-- resources/views/index.blade.php -->
@extends('layouts.app')

@section('title', 'POS System')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Dashboard</h1>

        <!-- Quick Stats Section -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Products</h5>
                        <p class="card-text">{{ $totalProducts }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Revenue</h5>
                        <p class="card-text">${{ $totalRevenue }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text">{{ $totalOrders }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders Section -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Recent Orders</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($recentOrders as $order)
                                <li class="list-group-item">
                                    <span class="badge bg-primary">#{{ $order->id }}</span>
                                    <span>{{ $order->product_name }}</span>
                                    <span class="float-end">${{ $order->price }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graph Section -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div id="graph" style="height: 400px;"></div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

@endsection

@push('styles')
    <style>
        .card {
            margin-bottom: 20px;
        }

        #graph {
            width: 100%;
        }
    </style>
@endpush

<!-- resources/views/index.blade.php -->
@extends('layouts.app')
<<<<<<< HEAD

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

=======

@section('title', 'POS System')

@section('content')
    <style>
        .main--content {
            position: relative;
            background: #ebe9e9;
            width: 100%;
            padding: 1rem;
        }
        .header--wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            background: #fff;
            border-radius: 10px;
            padding: 10px 2rem;
            margin-bottom: 1rem;
        }

        .header--title {
            color: rgba(113,99,186,255);
        }
        /* card container */
        .card--container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
        }

        .card--wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .main--title {
            color: rgba(113,99,186,255);
            padding-bottom: 10px;
            font-size: 15px;
        }

        .product--card {
            background: rgb(229,223,223);
            border-radius: 10px;
            padding: 1.2rem;
            width: 290px;
            height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.5s ease-in-out;
        }

            .product--card:hover {
                transform: translateY(-5px);
            }

        .card--header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .amount {
            display: flex;
            flex-direction: column;
        }

        .title {
            font-size: 12px;
            font-weight: 200;
        }

        .card--text {
            font-size: 24px;
            font-family: Courier New, Courier, monospace;
            font-weight: 600;
        }

        /* color css */
        .light-red {
            background: rgb(251,233,233);
        }

        .light-purple {
            background: rgb(254,226,254);
        }

        .light-green {
            background: rgb(235,254,235);
        }

        .light-blue {
            background: rgb(236,236,254);
        }

    </style>

    <div class="container">
    <div class="header--wrapper">
    <div class="header--title">
        <span>Primary</span>
        <h2>Dashboard</h2>
    </div>
</div>
        <!-- Quick Stats Section -->
       <div class="row">
                <!--<div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Products</h5>
                                <p class="card-text">{{ $totalProducts }}</p>
                            </div>
                        </div>
                    </div> -->

            <!-- start card details -->
            <div class="card--container">
                <h1 class="main--title">Product</h1>
                <div class="card--wrapper">
                    <div class="product--card light-red">
                        <div class="card--header">
                            <div class="amount">
                                <span class="card--title">Total Products</span>
                                <span class="card--text">{{ $totalProducts }}</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end card details -->


            <!-- start card details -->
            <div class="card--container">
                <h1 class="main--title">Revenue</h1>
                <div class="card--wrapper">
                    <div class="product--card light-green">
                        <div class="card--header">
                            <div class="amount">
                                <span class="card--title">Total Revenue</span>
                                <span class="card--text">${{ $totalRevenue }}</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end card details -->


           <!-- <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Revenue</h5>
                        <p class="card-text">${{ $totalRevenue }}</p>
                    </div>
                </div>
            </div> -->


            <!-- start card details -->
            <div class="card--container">
                <h1 class="main--title">Order</h1>
                <div class="card--wrapper">
                    <div class="product--card light-blue">
                        <div class="card--header">
                            <div class="amount">
                                <span class="card--title">Total Orders</span>
                                <span class="card--text">{{ $totalOrders }}</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end card details -->


            <!-- <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text">{{ $totalOrders }}</p>
                    </div>
                </div>
            </div>
        </div>  -->

        <!-- Recent Orders Section -->
        
                <div class="card--container" >
                    
                    <div class="card-header">
                        <h5 class="card-title">Recent Orders</h5>
                    </div>
                    
                    <div class="card amount">   <!-- card amount -->
                        <ul class="list-group">
                            @foreach($recentOrders as $order)
                                <li class="list-group-item">
                                    <span class="badge bg-primary">#{{ $order->id }}</span>
                                    <span>{{ $order->product_name }}</span>
                                    <span class="float-end">${{ $order->price }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div><!-- end card amount -->
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

>>>>>>> deature/from_jingyi
        #graph {
            width: 100%;
        }
    </style>
@endpush

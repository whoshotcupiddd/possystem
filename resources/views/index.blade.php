<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }
        nav {
            width: 200px;
            background-color: #333;
            height: 100vh;
            position: fixed;
            bottom: 0;
            left: 0;
            padding-top: 20px;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            padding: 10px 0;
            display: flex;
            align-items: center;
        }
        nav ul li a {
            display: flex;
            align-items: center;
            color: white;
            padding: 10px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        nav ul li a:hover {
            transform: scale(1.1);
        }

        .nav-divider {
            border-top: 1px solid #fff;
            margin: 10px 0;
            width: 100%;
        }
        .nav-title {
            color: #fff;
            padding: 10px;
            font-weight: bold;
        }
        .nav-item-logout a {
            color: red !important;
            font-weight: bold;
        }
        .content {
            flex: 1;
            padding: 20px;
            margin-left: 10px;
            margin-top: 80px;
        }
        .summary-box {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .summary-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .circle-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 60px;
            height: 60px;
            background-color: #007bff;
            color: white;
            border-radius: 50%;
            font-size: 24px;
            margin-left: auto;
        }
        .circle-icon i {
            margin: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #dee2e6;
        }
        th, td {
            border: none;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .table-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .recent-orders-title {
            border: none;
        }
        .order-separator {
            border-top: 1px solid #dee2e6;
        }
        .order-details td {
            border-bottom: 1px solid #dee2e6;
        }
        

        /* User profile styles */
        .user-profile {
            position: fixed;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .user-profile .user-details {
            display: flex;
            flex-direction: column;
        }
        .user-profile .user-details h2 {
            margin: 0;
            font-size: 16px;
            color: #333;
        }
        .user-profile .user-details p {
            margin: 5px 0 0 0;
            color: #6c757d;
            font-size: 12px;
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-dark bg-dark">
        <h1 style="color: white; text-align: center; margin-bottom: 20px;">POS SYSTEM</h1>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-users mr-2"></i> Customers</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-box mr-2"></i> Products</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-shopping-cart mr-2"></i> Orders</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-money-bill-wave mr-2"></i> Payments</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-receipt mr-2"></i> Receipts</a></li>
            <li class="nav-item"><hr class="nav-divider"></li>
            <li class="nav-item"><span class="nav-title">Reporting</span></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-chart-line mr-2"></i> Orders</a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-money-bill-wave mr-2"></i> Payments</a></li>
            <li class="nav-item"><hr class="nav-divider"></li>
            <li class="nav-item nav-item-logout"><a class="nav-link" href="#"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a></li>
        </ul>
    </nav>

    
    <div class="content">
    <div class="user-profile">
        <img src="profile-image.jpg" alt="Profile Image">
        <div class="user-details">
            <h2>John Doe</h2>
            <p>Position: Manager</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="summary-box">
                <h3>Customers</h3>
                <p>Total Customers: {{ $totalCustomers }}</p>
                <div class="circle-icon"><i class="fas fa-users"></i></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="summary-box">
                <h3>Products</h3>
                <p>Total Products: {{ $totalProducts }}</p>
                <div class="circle-icon"><i class="fas fa-box"></i></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="summary-box">
                <h3>Orders</h3>
                <p>Total Orders: {{ $totalOrders }}</p>
                <div class="circle-icon"><i class="fas fa-shopping-cart"></i></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="summary-box">
                <h3>Sales</h3>
                <p>Total Sales: ${{ $totalSales }}</p>
                <div class="circle-icon"><i class="fas fa-chart-line"></i></div>
            </div>
        </div>
    </div>

        <div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="8" class="recent-orders-title">Recent Orders</th>
                        </tr>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $order)
                        <tr class="order-details">
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->item }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>${{ $order->total }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                        <tr>
                            <td colspan="8"><hr class="order-separator"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>

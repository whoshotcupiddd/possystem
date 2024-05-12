<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Custom Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .sidenav {
            height: 100%;
            width: 220px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
            color: #fff;
            display: flex; /* Use flexbox */
            flex-direction: column; /* Arrange items vertically */
            justify-content: space-between; /* Align items with space between */
        }

        .sidenav h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            color: #fff;
            cursor: pointer; /* Add cursor pointer */
        }

        .sidenav a {
            padding: 12px 20px; /* Adjust padding */
            text-decoration: none;
            font-size: 18px;
            color: #dcdcdc; /* Lighter color */
            font-weight: normal; /* Less bold */
            display: block;
            transition: all 0.3s ease;
            display: flex; /* Use flexbox */
            align-items: center; /* Align items vertically */
        }

        .sidenav a:hover {
            background-color: #0056b3;
            color: #fff;
            transform: scale(1.05); /* Transform on hover */
        }

        .content {
            margin-left: 220px;
            padding: 20px;
            margin-top: 80px;
        }

        .input-group .form-control, .input-group .btn {
            border-radius: 90%; /* Removes border for a cleaner look */
        }

    </style>
</head>
<body>

<div class="sidenav">
    <a href="{{ route('index') }}" class="sidenav-title"><h1>POS SYSTEM</h1></a> <!-- Make the title clickable -->
    <a href="{{ route('products.index') }}"><i class="fas fa-box mr-2"></i> <span>Products</span></a>
    <a href="{{ route('orders.index') }}"><i class="fas fa-receipt mr-2"></i> <span>Orders</span></a>
    <a href="#"><i class="fas fa-shopping-cart mr-2"></i> <span>Cart</span></a>
    <a href="#"><i class="fas fa-user mr-2"></i> <span>User Profile</span></a> <!-- Changed icon to user icon -->
    <a href="{{ route('receipt') }}"><i class="fas fa-receipt mr-2"></i> <span>Receipts</span></a>

    <div style="margin-top: auto;"> <!-- Move the logout link to the bottom -->
        <hr style="background-color: #fff;">
        <a href="#" style="color: red; font-weight: bold;"><i class="fas fa-sign-out-alt mr-2"></i> <span>Logout</span></a>
    </div>
</div>

<main role="main" class="content">
    @yield('content')
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>

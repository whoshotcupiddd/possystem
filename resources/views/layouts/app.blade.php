<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
  
    <!-- <style>
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

    </style> -->

    <style>
        /* start navigation bar css */
@import url("https://fonts.googleapis.com/css2? family=Poppins:wght@400;600&display=swap");

* {
    margin: 0;
    padding: 0;
    border: none;
    outline: none;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    display: flex;
}

.sidebar {
    position: sticky;
    top: 0;
    left: 0;
    bottom: 0;
    width: 135px;
    height: 100vh;
    padding: 0 1.7rem;
    color: #fff;
    overflow: hidden;
    transition: all 0.5s linear;
    background: rgba(113, 99, 186, 255);
}
.sidebar:hover{
    width:240px;
    transition:0.5s;
}

.logo {
    height: 80px;
    padding: 16px;
}


.menu {
    height: 88%;
    position: relative;
    list-style: none;
    padding: 0;
}

    .menu li {
        padding: 1rem;
        margin: 20px 0;
        border-radius: 8px;
        transition: all 0.5s ease-in-out;
    }

        .menu li:hover,
        .active {
            background: #e0e0e058;
        }

    .menu a {
        color: #fff;
        font-size: 14px;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

        .menu a span {
            overflow: hidden;
        }

        .menu a i {
            font-size: 1.2rem;
        }

.logout {
    position: absolute;
    left: 0;
    width: 100%;
}
/* end of navigation bar css */
        </style>
=======
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
>>>>>>> origin/adminSystem
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

<<<<<<< HEAD
<div class="sidebar">
    <div class="logo">
        <div class="menu">
            <li class="active">
                <a href="{{ route('index') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}">
                    <i class="fas fas fa-box mr-2"></i>
                    <span>Product</span>
                </a>
            </li>
            <li>
                <a href="{{ route('orders.index') }}">
                    <i class="fas fa-receipt mr-2"></i>
                    <span>Order</span>
                </a>
            </li>
            <li>
                <a href="{{ route('order.history') }}">
                    <i class="fas fa-history"></i>
                    <span>History</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="logout">
                <a href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </div>
    </div>
</div>

<!-- <div class="sidenav">
    <a href="{{ route('index') }}"></a>  Make the title clickable 
    <a href="{{ route('products.index') }}"><i class="fas fa-box mr-2"></i> <span>Products</span></a>
    <a href="{{ route('orders.index') }}"><i class="fas fa-receipt mr-2"></i> <span>Orders</span></a>
    <a href="{{ route('order.history') }}"><i class="fas fa-shopping-cart mr-2"></i> <span>History</span></a>

    <a href="#"><i class="fas fa-user mr-2"></i> <span>User Profile</span></a>  Changed icon to user icon 

    <div style="margin-top: auto;"> Move the logout link to the bottom 
        <hr style="background-color: #fff;">
        <a href="#" style="color: red; font-weight: bold;"><i class="fas fa-sign-out-alt mr-2"></i> <span>Logout</span></a>
    </div>
</div> -->

<main role="main" class="content">
    @yield('content')
</main>
=======
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>
>>>>>>> origin/adminSystem

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

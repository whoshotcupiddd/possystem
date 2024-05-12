@extends('layouts.app')

@section('title', 'Product Inventory')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
            transition: background-color 0.3s;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Additional styles for search form */
        .search-form {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .search-form input[type="text"],
        .search-form select {
            flex: 1;
            margin-right: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .search-form button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .search-form button:hover {
            background-color: #0056b3;
        }

        /* Styles for product cards */
        .card-container {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-container img {
            max-width: 100%;
            border-radius: 8px;
        }

        .card-title {
            font-size: 1.5rem;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .card-text {
            margin-bottom: 10px;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Responsive styles */
        @media (max-width: 576px) {
            .container {
                padding: 10px;
            }

            .card-container {
                padding: 15px;
            }
        }
    </style>

    <div class="container my-4">
        <h2 class="mb-3">Product Menu</h2>

        <!-- Search Form -->
        <form class="search-form" action="{{ route('products.index') }}" method="GET">
            <input type="text" name="search" class="form-control" placeholder="Search by name">
            <select name="filter" class="form-control">
                <option value="">Filter by...</option>
                <option value="price_asc">Price: Low to High</option>
                <option value="price_desc">Price: High to Low</option>
            </select>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <!-- Product Cards -->
        @foreach($products as $product)
            <div class="card-container">
                <img src="{{ asset("images/" .$product->image_filepath) }}" alt="{{ $product->name }}" class="card-img">
                <h3 class="card-title">{{ $product->name }}</h3>
                <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>
                <p class="card-text"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                <p class="card-text"><strong>Quantity:</strong> {{ $product->quantity }}</p>
                <div class="card-footer">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach

        <div class="mt-4">
            <a href="{{ route('products.create') }}" class="btn btn-success">Add New Product</a>
        </div>
    </div>
@endsection

<!-- resources/views/products/products.blade.php -->

@extends('layouts.app')

@section('title', 'Product Inventory')

@section('content')
    <style>
        /* Style for card container */
        .card-container {
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: transform 0.2s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        .card-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        /* Style for card image */
        .card-img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* Style for card title */
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            text-transform: capitalize;
        }

        /* Style for card text */
        .card-text {
            font-size: 1rem;
            color: #666;
            margin-bottom: 10px;
            white-space: pre-wrap;
        }

        /* Style for card footer */
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #ddd;
            margin-top: auto;
            padding-top: 20px;
        }

        /* Style for edit and delete buttons */
        .btn {
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

    </style>

    <div class="container my-4">
        <h2 class="mb-3">Product Inventory</h2>
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

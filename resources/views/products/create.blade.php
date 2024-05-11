<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('title', 'Add New Product')

@section('content')
    <div class="container">
        <h2>Add New Product</h2>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

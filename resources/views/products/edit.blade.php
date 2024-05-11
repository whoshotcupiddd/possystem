<!-- resources/views/products/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="content">
                    <h2 class="mb-4">Edit Product</h2>
                    <form id="editForm" action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ $product->description }}">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Change Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript for handling form submissions
        document.getElementById('editForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            // Submit the form using JavaScript's fetch API
            fetch(this.action, {
                method: 'POST',
                body: new FormData(this)
            })
                .then(response => {
                    if (response.ok) {
                        // If update is successful, redirect to products page
                        window.location.href = "{{ route('products.index') }}";
                        // Display a pop-up window notifying the user of the update
                        alert('Product updated successfully.');
                    } else {
                        // If update fails, handle errors accordingly
                        alert('Failed to update product. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
@endsection

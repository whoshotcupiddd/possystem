@extends('layouts.app')

@section('title', 'Confirm Deletion')

@section('content')
    <div class="container">
        <h2>Confirm Deletion</h2>
        <p>Are you sure you want to delete this product?</p>
        <form action="{{ route('products.confirmAndDelete', $product) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Confirm Delete</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

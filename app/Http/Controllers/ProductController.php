<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the products with optional filtering.
     */
    public function index(Request $request)
    {
        $query = Product::query();

//        // Search filter
//        if ($request->has('search')) {
//            $query->where('name', 'like', '%' . $request->search . '%');
//        }
//
//        // Quantity filter
//        if ($request->has('quantity')) {
//            $query->where('quantity', '>=', $request->quantity);
//        }

        // Execute the query and get the results
        $products = Product::all();

        // Pass the retrieved products to the view
        return view('products.products', ['products' => $products]);
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified product in the database.
     */
    public function update(Request $request, Product $product)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|numeric|min:1',
        ]);

        // Update the product details
        $product->update($request->all());

        // Redirect back to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        // Delete the product from the database
        $product->delete();

        // Redirect back to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        // Return view for adding a new product
        return view('products.create');
    }

    /**
     * Store a newly created product in the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|numeric|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image
        ]);

        // Handle image upload
        $imagefilepath = $request->file('image')->store('images');

        // Create the product with image filepath
        Product::create(array_merge($request->all(), ['image_filepath' => $imagefilepath]));

        // Redirect back to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    /**
     * Update the product image in storage.
     */
    public function updateImage(Request $request, Product $product)
    {
        // Validate the incoming request data including the image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image
        ]);

        // Handle image upload
        $imagefilepath = $request->file('image')->store('images');

        // Delete previous image if exists
        if ($product->image_filepath) {
            Storage::delete($product->image_filepath);
        }

        // Update product with new image filepath
        $product->update(['image_filepath' => $imagefilepath]);

        // Redirect back to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product image updated successfully.');
    }

    /**
     * Remove the product image from storage.
     */
    public function deleteImage(Product $product)
    {
        // Delete image from storage
        if ($product->image_filepath) {
            Storage::delete($product->image_filepath);
        }

        // Update product with empty image filepath
        $product->update(['image_filepath' => null]);

        // Redirect back to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product image deleted successfully.');
    }
}

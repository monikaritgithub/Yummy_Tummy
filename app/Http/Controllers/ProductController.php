<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Rules\ValidChiefId;

class ProductController extends Controller
{
    public function index()
    {
        // Retrieve a list of products and display them.
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        // Display a form for creating a new product.
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Store a new product based on the submitted form data.
        $validatedData = $request->validate([
            // Define validation rules here
            'food_name' => 'required',
        'food_image' => 'nullable',
        'food_descriptions' => 'required',
        'ingredients' => 'required',
        'is_available' => 'required|boolean',
        'category_tag' => 'required',
        'quantity_available' => 'required|integer',
        'food_price' => 'required|numeric',
        'chief_id' => ['required', new ValidChiefId],
        ]);
        Product::create($validatedData);

        return response()->json(['message' => 'Product created successfully'], 201);    }

    public function show($id)
    {
        // Display the details of a specific product.
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        // Display a form for editing a product.
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Update a specific product based on the submitted form data.
        $validatedData = $request->validate([
            // Define validation rules here
        ]);
        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        // Delete a specific product.
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}

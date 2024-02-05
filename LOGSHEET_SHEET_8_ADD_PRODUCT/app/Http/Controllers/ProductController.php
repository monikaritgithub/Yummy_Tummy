<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Rules\ValidChiefId;
use Illuminate\Support\Facades\Auth;




class ProductController extends Controller
{
    public function index()
    {
        // Retrieve a list of products and display them.
        $user = auth()->user();
        $products = Product::where('chief_id', $user->id)->get();
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        // Display a form for creating a new product.
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        // Store a new product based on the submitted form data.
        $validatedData = $request->validate([
            // Define validation rules here

            'food_name' => 'required',
       
        'food_descriptions' => 'required',
        'ingredients' => 'nullable',
        'is_available' => 'required|in:true,false',
        'category_tag' => 'nullable',
        'quantity_available' => 'nullable|integer',
        'food_price' => 'required|numeric',
      
        ]);

         // Convert the string value to a boolean
    $validatedData['is_available'] = filter_var($request->input('is_available'), FILTER_VALIDATE_BOOLEAN);

        

    if($request->file('food_image')){
        $file= $request->file('food_image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('products'), $filename);
        $validatedData['food_image']= $filename;
    }


            // Set the chief_id to the currently authenticated user's ID
    $validatedData['chief_id'] = Auth::id();

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
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Update a specific product based on the submitted form data.
        $validatedData = $request->validate([
            // Define validation rules here

            'food_name' => 'required',
       
        'food_descriptions' => 'required',
        'ingredients' => 'nullable',
        'is_available' => 'required|in:true,false',
        'category_tag' => 'nullable',
        'quantity_available' => 'nullable|integer',
        'food_price' => 'required|numeric',
      
        ]);

         // Convert the string value to a boolean
    $validatedData['is_available'] = filter_var($request->input('is_available'), FILTER_VALIDATE_BOOLEAN);

        

    if($request->file('food_image')){
        $file= $request->file('food_image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('products'), $filename);
        $validatedData['food_image']= $filename;
    }


            // Set the chief_id to the currently authenticated user's ID
    $validatedData['chief_id'] = Auth::id();

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return redirect()->route('admin.viewProduct',$id)->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        // Delete a specific product.
    $product = Product::findOrFail($id);

    // Perform the deletion
    $product->delete();

    // Redirect to the index page or any other page after deletion
    return redirect()->route('admin.viewProduct')->with('success', 'Product deleted successfully');
    }
}

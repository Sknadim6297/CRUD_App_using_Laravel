<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {

        return view('products.index', ['products' => Product::get()]);
    }

    function AddProduct()
    {
        return view('products.create');
    }
    public function StoreProduct(Request $request)
    {
        // Store product logic
        $image_name = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $image_name);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->desc;
        $product->image = $image_name;
        $product->save();

        // Return back with a success message
        return back()->with('success', 'Product added successfully. Redirecting...');
    }


    public function DeleteProduct($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Get the image path
        $imagePath = public_path('products/') . $product->image;

        // Check if the image exists and delete it from the folder
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // Delete the product from the database
        $product->delete();

        // Redirect back with success message
        return back()->with('success', 'Product  deleted successfully.');
    }

    public function EditProduct($id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.edit', ['product' => $product]);
    }
    public function UpdateProduct(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);
        $product = Product::where('id', $id)->first();
        if (isset($request->image)) {
            $image_name = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $image_name);
            $product->image = $image_name;
        }


        $product->name = $request->name;
        $product->description = $request->desc;
        $product->save();

        return back()->with('success', 'Product updated successfully...redirecting');
    }
}

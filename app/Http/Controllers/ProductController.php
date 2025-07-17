<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Request input parameters from view and
        // set sort column and direction
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'created_at');
        $sortDir = $request->input('sort_dir', 'desc');

        // Set sortable columns
        $validSortColumns = ['prd_name', 'prd_quantity', 'prd_price', 'created_at'];
        if (! in_array($sortBy, $validSortColumns)) {
            $sortBy = 'created_at';
        }

        // Query according to search parameters
        // Currently searches for prd_name and prd_description
        $query = Product::query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('prd_name', 'like', "%{$search}%")
                    ->orWhere('prd_description', 'like', "%{$search}%");
            });
        }

        // Sort query and add pagination
        $query->orderBy($sortBy, $sortDir);
        $products = $query->paginate(10);

        // Pass search and sort parameters to pagination
        $products->appends($request->all());

        // Pass all the data to the view
        return view('products.index', compact('products', 'search', 'sortBy', 'sortDir'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = $request->validate([
            'prd_name' => 'required|string|max:255',
            'prd_description' => 'nullable|string',
            'prd_quantity' => 'required|integer|min:0',
            'prd_price' => 'required|numeric|min:0',
        ]);
        Product::create($product);

        return to_route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'prd_name' => 'required|string|max:255',
            'prd_description' => 'nullable|string',
            'prd_quantity' => 'required|integer|min:0',
            'prd_price' => 'required|numeric|min:0',
        ]);
        $product->update($data);

        return to_route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('product.index');
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\Dashboard\Product\ProductServiceInterface;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('dashboard.products.index', compact('products'));
    }

    public function store(ProductRequest $request)
    {
        $this->productService->createProduct($request);
        return redirect()->route('dashboard.products.index')->with('success_message', 'The product has been added successfully');
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }

    public function edit(Product $product)
    {
        return view('dashboard.products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->productService->updateProduct($request, $product);
        return redirect()->route('dashboard.products.index')->with('success_message', 'The product has been updated successfully');
    }

    public function show(Product $product)
    {
        return view('dashboard.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        $this->productService->deleteProduct($product);
        return redirect()->route('dashboard.products.index')->with('success_message', 'The product has been deleted successfully');
    }
}

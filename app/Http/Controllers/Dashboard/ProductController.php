<?php

namespace App\Http\Controllers\Dashboard;
;

use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view('dashboard.products.index', compact('products'));
    }

    public function store(ProductRequest $request)
    {
        $attributes = $request->validated();

        $attributes['image'] = (new Helpers)->uploadImage($request->file('image'), 'products');
        Product::create($attributes);

        return redirect()->route('dashboard.products.index')->with('success_message', 'The product has been Added successfully');
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

    public function update(ProductRequest $request , Product $product)
    {
        $attributes = $request->validated();
        if (request()->file('image'))
            $attributes['image'] = (new Helpers)->uploadImage($request->file('image'), 'products');

        $product->update($attributes);

        return redirect()->route('dashboard.products.index')->with('success_message', 'The product has been Updated successfully');
    }

    public function show(Product $product)
    {
        return view('dashboard.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('dashboard.products.index')->with('success_message', 'The Product has been Deleted successfully');

    }
}

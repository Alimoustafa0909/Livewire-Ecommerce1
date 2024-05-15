<?php

namespace App\Services\Dashboard\Product;

use App\Helpers;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductService implements ProductServiceInterface
{
    public function getAllProducts()
    {
        return Product::paginate(6);
    }

    public function createProduct(ProductRequest $request): void
    {
        $attributes = $request->validated();
        $attributes['image'] = (new Helpers)->uploadImage($request->file('image'), 'products');
        Product::create($attributes);
    }

    public function updateProduct(ProductRequest $request, Product $product): void
    {
        $attributes = $request->validated();
        if ($request->file('image')) {
            $attributes['image'] = (new Helpers)->uploadImage($request->file('image'), 'products');
        }
        $product->update($attributes);
    }

    public function deleteProduct(Product $product): void
    {
        $product->delete();
    }
}

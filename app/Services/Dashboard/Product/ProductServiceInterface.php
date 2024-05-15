<?php

namespace App\Services\Dashboard\Product;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

interface ProductServiceInterface
{
    public function getAllProducts();
    public function createProduct(ProductRequest $request): void;
    public function updateProduct(ProductRequest $request, Product $product): void;
    public function deleteProduct(Product $product): void;
}

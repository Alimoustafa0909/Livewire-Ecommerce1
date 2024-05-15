<?php

namespace App\Services\Dashboard\Category;

use App\Models\Category;

interface CategoryServiceInterface
{
    public function getAllCategories();
    public function createCategory(array $attributes): void;
    public function updateCategory(Category $category, array $attributes): void;
    public function deleteCategory(Category $category): void;
}

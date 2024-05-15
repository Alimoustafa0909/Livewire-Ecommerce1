<?php

namespace App\Services\Dashboard\Category;

use App\Helpers;
use App\Models\Category;

class CategoryService implements CategoryServiceInterface
{
    public function getAllCategories()
    {
        return Category::paginate(6);
    }

    public function createCategory(array $attributes): void
    {
        $attributes['image'] = (new Helpers)->uploadImage($attributes['image'], 'categories');
        $category = Category::create($attributes);

        foreach ($attributes['categories'] ?? [] as $categoryId) {
            Category::find($categoryId)->update(['parent_id' => $category->id]);
        }
    }

    public function updateCategory(Category $category, array $attributes): void
    {
        $category->update($attributes);
    }

    public function deleteCategory(Category $category): void
    {
        $category->delete();
    }
}

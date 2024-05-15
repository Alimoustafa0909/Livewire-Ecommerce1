<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\Dashboard\Category\CategoryServiceInterface;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('dashboard.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $categories = $this->categoryService->getAllCategories();
        return view('dashboard.categories.edit', compact('category', 'categories'));
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryService->createCategory($request->validated());
        return redirect()->route('dashboard.categories.index')->with('success_message', 'The category has been added successfully');
    }

    public function create()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('dashboard.categories.create', compact('categories'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $this->categoryService->updateCategory($category, $request->validated());
        return redirect()->route('dashboard.categories.index')->with('success_message', 'The category has been updated successfully');
    }

    public function destroy(Category $category)
    {
        $this->categoryService->deleteCategory($category);
        return redirect()->route('dashboard.categories.index')->with('success_message', 'The category has been deleted successfully');
    }
}

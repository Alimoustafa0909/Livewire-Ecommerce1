<?php

namespace App\Http\Livewire;

use App\Helpers;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;


class CategoryComponent extends Component
{

    use WithPagination;

    public $slug;
    public $pageSize = 12;
    public $orderBy = 'Default Sorting';


    public function store($product_id, $product_name, $product_price)
    {
        (new Helpers)->addToCart($product_id, $product_name, $product_price);
        $this->emit('cart-icon-component', 'refreshComponent');
    }


    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    public function changeOrderBy($order)
    {
        $this->orderBy = $order;
    }

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $category = Category::where('slug', $this->slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        if ($this->orderBy == 'Price: Low to High') {
            $products = Product::where('category_id', $category_id)->orderBy('regular_price', 'ASC')->paginate($this->pageSize);
        } elseif ($this->orderBy == 'Price: High to Low') {
            $products = Product::where('category_id', $category_id)->orderBy('regular_price', 'DESC')->paginate($this->pageSize);
        } elseif ($this->orderBy == 'Release Date') {
            $products = Product::where('category_id', $category_id)->orderBy('created_at', 'DESC')->paginate($this->pageSize);
        } else {
            $products = Product::where('category_id', $category_id)->paginate($this->pageSize);
        }
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('livewire.category-component', compact('products', 'categories', 'category_name'));
    }

    public function storeToWishlist($product_id, $product_name, $product_price)
    {
        (new Helpers)->addToWishList($product_id, $product_name, $product_price);
        $this->emit('refreshComponent');
    }

    public function removeFromWishlist($product_id)
    {
        (new Helpers)->deleteFromWishlist($product_id);
        $this->emit('refreshComponent');
    }

}

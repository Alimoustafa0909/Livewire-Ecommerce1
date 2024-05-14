<?php

namespace App\Http\Livewire;

use App\Helpers;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;


class ShopComponent extends Component
{

    use WithPagination;

    public $pageSize = 12;
    public $orderBy = 'Default Sorting';


    public function render()
    {
        if ($this->orderBy == 'Price: Low to High') {
            $products = Product::orderBy('price', 'ASC')->paginate($this->pageSize);
        } elseif ($this->orderBy == 'Price: High to Low') {
            $products = Product::orderBy('price', 'DESC')->paginate($this->pageSize);
        } elseif ($this->orderBy == 'Release Date') {
            $products = Product::orderBy('created_at', 'DESC')->paginate($this->pageSize);
        } else {
            $products = Product::paginate($this->pageSize);
        }
        $categories = Category::orderBy('name', 'ASC')->get();
        $new_products = Product::latest()->take(4)->get();
        return view('livewire.shop-component', compact('products', 'categories','new_products'));
    }


    public function store($product_id, $product_name, $product_price)
    {
        (new Helpers)->addToCart($product_id, $product_name, $product_price);
        $this->emit('refreshComponent');

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


    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    public function changeOrderBy($order)
    {
        $this->orderBy = $order;
    }


}

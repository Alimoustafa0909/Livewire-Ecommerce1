<?php

namespace App\Http\Livewire;

use App\Helpers;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;


class SearchComponent extends Component
{
    use WithPagination;


    public $pageSize = 12;
    public $orderBy = 'Default Sorting';


    public $q;
    public $search_term;


    //constructor
    public function mount()
    {
        $this->fill(request()->only('q'));
        $this->search_term = '%' . $this->q . '%';
    }

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


    public function render()
    {
        if ($this->orderBy == 'Price: Low to High') {
            $products = Product::where('name', 'like', $this->search_term)->orderBy('regular_price', 'ASC')->paginate($this->pageSize);
        } elseif ($this->orderBy == 'Price: High to Low') {
            $products = Product::where('name', 'like', $this->search_term)->orderBy('regular_price', 'DESC')->paginate($this->pageSize);
        } elseif ($this->orderBy == 'Release Date') {
            $products = Product::where('name', 'like', $this->search_term)->orderBy('created_at', 'DESC')->paginate($this->pageSize);
        } else {
            $products = Product::where('name', 'like', $this->search_term)->paginate($this->pageSize);
        }
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('livewire.search-component', compact('products', 'categories'));
    }
}

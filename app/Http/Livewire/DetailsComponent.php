<?php

namespace App\Http\Livewire;

use App\Helpers;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function store($product_id, $product_name, $product_price)
    {
        (new Helpers)->addToCart($product_id, $product_name, $product_price);
        $this->emit('refreshComponent');
    }

    public function render()
    {
        $categories=Category::all();
        $product = Product::where('slug', $this->slug)->first();
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        $new_products = Product::latest()->take(4)->get();
        return view('livewire.details-component', compact('product', 'related_products', 'new_products','categories'));
    }
}

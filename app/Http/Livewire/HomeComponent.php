<?php

namespace App\Http\Livewire;

use App\Helpers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $categories = Category::all();
        $products = Product::all();
        $featuerd_products = Product::where('featured', "=", '1')->paginate(4);
        $new_products = Product::latest()->take(8)->get();
        $HeaderSliders = Slider::where('type', 'header')->get();
        $bodySliders = Slider::latest()->where('type', 'body')->first();

        return view('livewire.home-component',
            compact(
                'categories',
                'products',
                'featuerd_products',
                'new_products',
                'HeaderSliders',
                'bodySliders',
            ));
    }

    public function storeToWishlist($product_id, $product_name, $product_price)
    {
        (new Helpers)->addToWishList($product_id, $product_name, $product_price);
        $this->emit('refreshComponent');
    }

    public function store($product_id, $product_name, $product_price)
    {
        (new Helpers)->addToCart($product_id, $product_name, $product_price);
        $this->emit('refreshComponent');

    }

    public function removeFromWishlist($product_id)
    {
        (new Helpers)->deleteFromWishlist($product_id);
        $this->emit('refreshComponent');
    }

}

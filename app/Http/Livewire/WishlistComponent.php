<?php

namespace App\Http\Livewire;

use App\Helpers;
use Livewire\Component;

class WishlistComponent extends Component
{
    public function removeFromWishlist($product_id)
    {
        (new Helpers)->deleteFromWishlist($product_id);
        $this->emit('refreshComponent');
    }

    public function render()
    {
        return view('livewire.wishlist-component');
    }
}

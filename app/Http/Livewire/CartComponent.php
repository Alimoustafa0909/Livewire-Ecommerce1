<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartComponent extends Component
{
    public function render()
    {
        return view('livewire.cart-component');
    }

    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emit('refreshComponent');
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emit('refreshComponent');
    }

// Delete CartItem From The Cart Component Function
    public function DeleteItem($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        session()->flash('success', 'Item Deleted successfully From Your Cart');
        $this->emit('refreshComponent');
    }

    public function clearAll()
    {
        Cart::instance('cart')->destroy();
        $this->emit('refreshComponent');
    }

}

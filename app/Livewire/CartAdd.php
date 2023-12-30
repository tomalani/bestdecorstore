<?php

namespace App\Livewire;

use Livewire\Component;
use App\Facades\Cart;

class CartAdd extends Component
{
    public $product;
    public $quantity = 1;

    public function increment()
    {
        $this->quantity++;
    }

    public function decrement()
    {
        $this->quantity--;
    }

    public function addToCart(): void
    {
        Cart::add($this->product->id, $this->product->product_name, $this->product->price, $this->quantity);
        $this->dispatch('productAddedToCart');
    }

    public function render()
    {
        return view('livewire.cart-add');
    }
}

<?php

namespace App\Livewire;

use App\Models\ProductModel;
use Livewire\Component;
use App\Facades\Cart;
use Illuminate\Contracts\View\View;

class ProductBlock extends Component
{
    public $product;
    public $quantity;

    public function mount(): void
    {
        $this->quantity = 1;
    }

    public function render()
    {
        return view('livewire.product-block');
    }

    public function addToCart(): void
    {
        Cart::add($this->product->id, $this->product->product_name, $this->product->price, $this->quantity);
        $this->dispatch('productAddedToCart');
    }
}

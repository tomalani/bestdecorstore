<?php

namespace App\Livewire;

use App\Facades\Cart;
use App\Models\ProductModel;
use Livewire\Component;

class ProductCarousel extends Component
{
    public $product_hightlights;
    public $quantity;

    public function mount(): void
    {
        $this->quantity = 1;
    }

    public function render()
    {
        return view('livewire.product-carousel');
    }

    public function addToCart($id): void
    {
        $product = ProductModel::find($id);
        Cart::add($id, $product->product_name, $product->price, $this->quantity);
        $this->dispatch('productAddedToCart');
    }
}

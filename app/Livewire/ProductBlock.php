<?php

namespace App\Livewire;

use App\Models\ProductModel;
use Livewire\Component;

class ProductBlock extends Component
{
    public $id;
    public $product_name;
    public $price;

    public function mount($id)
    {
        $product = ProductModel::find($id);

        $this->id = $product->id;
        $this->product_name = $product->product_name;
        $this->price = $product->price;
    }

    public function render()
    {
        return view('livewire.product-block');
    }
}

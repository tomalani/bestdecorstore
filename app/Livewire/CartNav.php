<?php

namespace App\Livewire;

use Livewire\Component;
use App\Facades\Cart;
use Illuminate\Contracts\View\View;

class CartNav extends Component
{
    protected $total;
    protected $content;

    protected $listeners = [
        'productAddedToCart' => 'updateCart',
    ];

    public function mount(): void
    {
        $this->updateCart();
    }

    public function render(): View
    {
        return view('livewire.cart-nav', [
            'total' => $this->total,
            'content' => $this->content,
        ]);
    }

    /**
     * Removes a cart item by id.
     *
     * @param string $id
     * @return void
     */
    public function removeFromCart(string $id): void
    {
        Cart::remove($id);
        $this->updateCart();
    }

    /**
     * Clears the cart content.
     *
     * @return void
     */
    public function clearCart(): void
    {
        Cart::clear();
        $this->updateCart();
    }

    /**
     * Updates a cart item.
     *
     * @param string $id
     * @param string $action
     * @return void
     */
    public function updateCartItem(string $id, string $action): void
    {
        Cart::update($id, $action);
        $this->updateCart();
    }

    /**
     * Rerenders the cart items and total price on the browser.
     *
     * @return void
     */
    public function updateCart()
    {
        $this->total = Cart::total();
        $this->content = Cart::content();
    }
}

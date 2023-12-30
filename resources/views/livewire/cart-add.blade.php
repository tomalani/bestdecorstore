<div class="d-flex flex-row mt-5 product-quan align-items-center">
    <button class="btn" wire:click="decrement">-</button>
    <div class="product-quan-num">{{ $quantity }}</div>
    <button class="btn" wire:click="increment">+</button>
    <button class="btn-cart welcome-add-cart"
        wire:click="addToCart()">
        <span class="lnr lnr-plus-circle"></span>
        add <span>to</span> cart
    </button>
</div>

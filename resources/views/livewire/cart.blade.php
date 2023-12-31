<div>
    @if ($content->count() > 0)
        @foreach ($content as $id => $item)
        <div class="row cart-row">
            <div class="col-md-1">
                <img src="{{ url('assets/img/product/'.$item['id'].'.jpg')}}" class="cart-img" alt="{{ $item['name'] }}">
            </div>
            <div class="col-md-4">
                <h5>{{ $item['name'] }}</h5>
            </div>
            <div class="col-md-2">
                $ {{ $item['price'] }}
            </div>
            <div class="col-md-2">
                <button class="cart-btn-quan" wire:click="updateCartItem({{ $id }}, 'minus')"> - </button>
                {{ $item->get('quantity') }}
                <button class="cart-btn-quan" wire:click="updateCartItem({{ $id }}, 'plus')"> + </button>
            </div>
            <div class="col-md-2 cart-price-total">
                $ {{ $item['price']*$item->get('quantity') }}
            </div>
            <div class="col-md-1">
                <button class="cart-remove" wire:click="removeFromCart({{ $id }})">Remove</button>
            </div>
        </div>
        @endforeach
        <div class="row cart-total">
            <div class="col">
                <div class="col-md-2">
                    <button class="btn-cart welcome-add-cart animated fadeInDown" onclick="window.location.href='{{ route('home') }}';">Back <span>to</span> Shopping</button>
                </div>
                <div class="col-md-8 cart-total-num">
                    <p>Total $ {{ $total }}</p>
                </div>
                <div class="col-md-2">
                    <button class="btn-cart welcome-add-cart animated fadeInDown" onclick="window.location.href='{{ route('checkout') }}';">Checkout</button>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col cart-empty">
                <h2>Cart is empty.</h2>
                <a href="{{ route('home') }}">Back to shopping</a>
            </div>
        </div>   
    @endif
</div>
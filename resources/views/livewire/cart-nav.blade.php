<div>
<li class="dropdown">
    <button class="dropdown-toggle" data-toggle="dropdown">
        <span class="lnr lnr-cart"></span>
        <span class="badge badge-bg-1">{{ $content->count() }}</span>
    </button>
    <ul class="dropdown-menu cart-list s-cate">

        @if ($content->count() > 0)
        @foreach ($content as $id => $item)
        <li class="single-cart-list">
            <div href="#" class="photo">
                <img src="{{ url('assets/img/product/'.$id.'.jpg') }}" class="cart-thumb" alt="{{ $item->get('name') }}" />
            </div>
            <div class="cart-list-txt">
                <h6>{{ $item->get('name') }}</h6>
                <p>{{ $item->get('quantity') }} x  <span class="price">${{ $item->get('price') }}</span></p>
            </div><!--/.cart-list-txt-->
            <div class="cart-close">
                <span class="lnr lnr-cross" wire:click="removeFromCart({{ $id }})">
                    <img src="{{ url('assets/img/bin.svg') }}" alt="" class="bin">
                </span>
            </div><!--/.cart-close-->
        </li><!--/.single-cart-list -->

        @endforeach

        <li class="total">
            <span>Total: ${{ $total }}</span>
            <button class="btn-cart pull-right" onclick="window.location.href='{{ route('cart') }}'">view cart</button>
        </li>

        @else
        <p class="text-3xl text-center cart-empty">cart is empty!</p>
        @endif
    </ul>
</li>
</div>

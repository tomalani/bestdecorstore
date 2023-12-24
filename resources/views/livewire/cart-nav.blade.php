<div>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="lnr lnr-cart"></span>
        <span class="badge badge-bg-1">0</span>
    </a>
    <ul class="dropdown-menu cart-list s-cate">

        @if ($content->count() > 0)
        @foreach ($content as $id => $item)
        <li class="single-cart-list">
            <a href="#" class="photo"><img
                    src="{{ url('assets/img/product/'.$id.'.jpg') }}" class="cart-thumb"
                    alt="image" /></a>
            <div class="cart-list-txt">
                <h6><a href="#">{{ $item->get('name') }}</h6>
                <p>{{ $item->get('quantity') }} x - <span class="price">${{ $item->get('price') }}</span></p>
            </div><!--/.cart-list-txt-->
            <div class="cart-close">
                <span class="lnr lnr-cross"></span>
            </div><!--/.cart-close-->
        </li><!--/.single-cart-list -->

        @endforeach

        <li class="total">
            <span>Total: $0.00</span>
            <button class="btn-cart pull-right" onclick="window.location.href='#'">view
                cart</button>
        </li>

        @else
        <p class="text-3xl text-center mb-2">cart is empty!</p>
        @endif
    </ul>
</li>
</div>

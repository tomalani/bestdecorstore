<div class="col-4 col-sm-4 col-md-3">
    <div class="single-new-arrival">
        <div class="single-new-arrival-bg">
            <img src="{{ url('assets/img/product/'.$product->id.'.jpg') }}" alt="new-arrivals images">
            <div class="single-new-arrival-bg-overlay"></div>
            @if($product->price_from)
            <div class="sale bg-1">
                <p>sale</p>
            </div>
            @endif
            <div class="new-arrival-cart">
                <p>
                    <span class="lnr lnr-cart"></span>
                    <a wire:click="addToCart">add <span>to </span> cart</a>
                </p>
            </div>
        </div>
        <h4><a href="{{ url('shop/'.$product->id) }}">{{ $product->product_name }}</a></h4>
        <p class="arrival-product-price">${{ $product->price }}</p>
        <del>{{ $product->price_from }}</del>
    </div>
</div>

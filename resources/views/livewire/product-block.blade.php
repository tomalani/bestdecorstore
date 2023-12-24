<div class="col-md-3 col-sm-4">
    <div class="single-new-arrival">
        <div class="single-new-arrival-bg">
            <img src="{{ url('assets/img/product/'.$product->id.'.jpg') }}" alt="new-arrivals images">
            <div class="single-new-arrival-bg-overlay"></div>
            <div class="sale bg-1">
                <p>sale</p>
            </div>
            <div class="new-arrival-cart">
                <p>
                    <span class="lnr lnr-cart"></span>
                    <a href="#" wire:click="addToCart">add <span>to </span> cart</a>
                </p>
            </div>
        </div>
        <h4><a href="#">{{ $product->product_name }}</a></h4>
        <p class="arrival-product-price">${{ $product->price }}</p>
    </div>
</div>

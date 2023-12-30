<!-- home.blade.php -->

@extends('layouts.layout_template')

@section('content')
    

    <!--populer-products start -->
    <section id="populer-products" class="populer-products mt-10 cart-container">
        <div class="container">
            <div class="populer-products-content">
                <div class="row">
                    <div class="col cart-header">
                        <h1 class="">{{ $product->product_name }}</h1>
                    </div>
                </div>

                <div class="row mt-5 mb-5 product-detail">
                    <div class="col-sm-12 col-md-5 col-12">
                        <img src="{{ url('assets/img/product/'.$product->id.'.jpg') }}" class="img-fluid" id="product-image" alt="">
                        <div class="row img-product-container d-flex flex-row flex-wrap">
                            <div class="col-md-4">
                                <img src="{{ url('assets/img/product/'.$product->id.'.jpg') }}" class="img-product" data-img="{{ $product->id }}.jpg"  />
                            </div>
                            @foreach ($imgProducts as $item)
                                <div class="col-md-4">
                                    <img src="{{ url('assets/img/product/'.$item->image_name) }}" class="img-product" data-img="{{ $item->image_name }}"  />
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="offset-sm-0 offset-md-1 col-sm-12 col-md-6 col-12">
                        <p class="product-header">Product:</p>
                        <p class="product-name">{{ $product->product_name }}</p>
                        <p class="product-header">Description:</p>
                        <p>{{ $product->product_description }}</p>
                        <p class="product-price">$ {{ number_format($product->price, 2) }}</p>
                        <div class="d-flex flex-row mt-5 product-quan align-items-center">
                            <button class="btn">-</button>
                            <div class="product-quan-num">1</div>
                            <button class="btn">+</button>
                            <button class="btn-cart welcome-add-cart"
                                wire:click="addToCart({{ $product->id }})">
                                <span class="lnr lnr-plus-circle"></span>
                                add <span>to</span> cart
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 products-related">
                    <h3 class="">Related products</h3>
                    <div class="row d-flex flex-wrap">
                        @foreach ($relateProducts as $item)
                            <div class="product-related col-md-4 text-center">
                                <a href="{{ url('shop/'.$item->id) }}">
                                    <img src="{{ url('assets/img/product/'.$item->id.'.jpg') }}" alt="">
                                    <p class="text-center mt-3">{{ $item->product_name }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                
            </div>
        </div><!--/.container-->

    </section><!--/.populer-products-->
    <!--populer-products end-->

@endsection

@section('scripts')
<script>
    $('.img-product').click(function() {
        let image_product = $(this).data('img');
        console.log(image_product)
        $('#product-image').attr('src', '/assets/img/product/'+image_product);
    });
</script>
@endsection

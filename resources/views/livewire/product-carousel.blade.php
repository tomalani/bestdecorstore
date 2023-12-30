<div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
    <!--/.carousel-indicator -->
    <ol class="carousel-indicators">
        @foreach ($product_hightlights as $key => $product_hl)
        <li data-target="#header-carousel" data-slide-to="{{ $key }}" @if($key == 0) class="active" @endif><span class="small-circle"></span></li>
        @endforeach
    </ol><!-- /ol-->
    <!--/.carousel-indicator -->

    <!--/.carousel-inner -->
    <div class="carousel-inner" role="listbox">
        
        @foreach ($product_hightlights as $key => $product_hl)
        <!-- .item -->
        <div class="item @if($key == 0) active @endif">
            <div class="single-slide-item slide1">
                <div class="container">
                    <div class="welcome-hero-content">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="single-welcome-hero">
                                    <div class="welcome-hero-txt">
                                        <h4>great design collection</h4>
                                        <h2>{{ $product_hl->product_name }}</h2>
                                        <p>
                                            {{ $product_hl->product_description }}
                                        </p>
                                        <div class="packages-price">
                                            <p>
                                                $ {{ $product_hl->price }}
                                                @if($product_hl->price_from) <del>$ {{ $product_hl->price_from }}</del> @endif
                                            </p>
                                        </div>
                                        <button class="btn-cart welcome-add-cart"
                                            wire:click="addToCart({{ $product_hl->id }})">
                                            <span class="lnr lnr-plus-circle"></span>
                                            add <span>to</span> cart
                                        </button>
                                        <button class="btn-cart welcome-add-cart welcome-more-info"  onclick="location.replace('{{ url('shop/'.$product_hl->id) }}')" >more info</button>
                                    </div><!--/.welcome-hero-txt-->
                                </div><!--/.single-welcome-hero-->
                            </div><!--/.col-->
                            <div class="col-sm-5">
                                <div class="single-welcome-hero">
                                    <div class="welcome-hero-img">
                                        <img src="{{ url('assets/img/product/' . $product_hl->id . '.png') }}" alt="slider image">
                                    </div><!--/.welcome-hero-txt-->
                                </div><!--/.single-welcome-hero-->
                            </div><!--/.col-->
                        </div><!--/.row-->
                    </div><!--/.welcome-hero-content-->
                </div><!-- /.container-->
            </div><!-- /.single-slide-item-->

        </div><!-- /.item .active-->
        @endforeach

    </div><!-- /.carousel-inner-->

</div><!--/#header-carousel-->

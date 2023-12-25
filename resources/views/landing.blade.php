<!-- home.blade.php -->

@extends('layouts.layout_template')

@section('content')
    <!--welcome-hero start -->
    <header id="home" class="welcome-hero">

        <livewire:product-carousel :product_hightlights="$product_hightlights" />

        

    </header><!--/.welcome-hero-->
    <!--welcome-hero end -->

    <!--populer-products start -->
    <section id="populer-products" class="populer-products">
        <div class="container">
            <div class="populer-products-content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="single-populer-products">
                            <div class="single-populer-product-img mt40">
                                <img src="assets/images/populer-products/a1.png" alt="populer-products images">
                            </div>
                            <h2><a href="#">wrought and cast iron</a></h2>
                            <div class="single-populer-products-para">
                                <p>Wrought And Cast Iron Ganesha Tealight Candle holder Multi-colour for Home Decor.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single-populer-products">
                            <div class="single-inner-populer-products">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="single-inner-populer-product-img">
                                            <img src="assets/images/populer-products/a2.png"
                                                alt="populer-products images">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <div class="single-inner-populer-product-txt">
                                            <h2>
                                                <a href="#">
                                                    Cube Style Glass Vase
                                                </a>
                                            </h2>
                                            <p>
                                                Edi ut perspiciatis unde omnis iste natusina error sit voluptatem
                                                accusantium doloret mque laudantium, totam rem aperiam.
                                            </p>
                                            <div class="populer-products-price">
                                                <h4>Sales Start from <span>$99.00</span></h4>
                                            </div>
                                            <button class="btn-cart welcome-add-cart populer-products-btn"
                                                onclick="window.location.href='#'">
                                                discover more
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="single-populer-products">
                            <div class="single-populer-products">
                                <div class="single-populer-product-img">
                                    <img src="assets/images/populer-products/a3.png" alt="populer-products images">
                                </div>
                                <h2><a href="#">Nutts</a></h2>
                                <div class="single-populer-products-para">
                                    <p>Nemo enim ipsam voluptatem quia volu ptas sit asperna aut odit aut fugit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->

    </section><!--/.populer-products-->
    <!--populer-products end-->

    <!--new-arrivals start -->
    <section id="new-arrivals" class="new-arrivals">
        <div class="container">
            <div class="section-header">
                <h2>product</h2>
            </div><!--/.section-header-->
            <div class="new-arrivals-content">
                <div class="row" style="display:flex; flex-wrap: wrap;">
                    
                    @foreach ($products as $product)
                        <livewire:product-block :product="$product" />
                    @endforeach

                </div>
            </div>
        </div><!--/.container-->

    </section><!--/.new-arrivals-->
    <!--new-arrivals end -->

    
@endsection

@section('scripts')

@endsection

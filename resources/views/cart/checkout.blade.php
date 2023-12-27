<!-- home.blade.php -->

@extends('layouts.layout_template')

@section('css')

    
@stop

@section('content')
    

    <!--populer-products start -->
    <section id="populer-products" class="populer-products mt-10 cart-container">
        <div class="container">
            <div class="checkout">
                <div class="row">
                    <div class="col cart-header">
                        <h1 class="">Checkout</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <form action="{{ route('order-save') }}" method="post">
                        <div class="row">
                            <h2>Billing details</h2>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">First name <span>*</span></label>
                                <input type="text" class="form-control" id="firstname" placeholder="">
                            </div>
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Last name <span>*</span></label>
                                <input type="text" class="form-control" id="lastname" placeholder="">
                            </div>
                        </div>
                        <div class="row mt-20px">
                            <div class="col-sm-12">
                                <label for="country_selector" class="form-label">Country / Region <span>*</span></label>
                                <input id="country_selector" type="text" class="form-control w-100">
                            </div>
                        </div>
                        <div class="row mt-20px">
                            <div class="col-sm-12">
                                <label for="address" class="form-label">Street address <span>*</span></label>
                                <input type="text" class="form-control" id="address" placeholder="House number and street name">
                                <input type="text" class="form-control mt-10px" id="address2" placeholder="Apartment, suite, unit, etc. (optional)">
                            </div>
                        </div>
                        <div class="row mt-20px">
                            <div class="col-sm-12">
                                <label for="city" class="form-label">Town/City <span>*</span></label>
                                <input type="text" class="form-control" id="city" placeholder="">
                            </div>
                        </div>
                        <div class="row mt-20px">
                            <div class="col-sm-12">
                                <label for="state" class="form-label">State <span>*</span></label>
                                <input type="text" class="form-control" id="state" placeholder="">
                            </div>
                        </div>
                        <div class="row mt-20px">
                            <div class="col-sm-12">
                                <label for="zipcode" class="form-label">Postcode/ZIP <span>*</span></label>
                                <input type="text" class="form-control" id="zipcode" placeholder="">
                            </div>
                        </div>
                        <div class="row mt-20px">
                            <div class="col-sm-12">
                                <label for="email" class="form-label">Email address <span>*</span></label>
                                <input type="email" class="form-control" id="email" placeholder="name@example.com">
                            </div>
                        </div>
                        <div class="row mt-20px">
                            <div class="col-sm-12">
                                <label for="phone" class="form-label">Phone </label>
                                <input type="text" class="form-control" id="phone" placeholder="">
                            </div>
                        </div>
                        <div class="row mt-20px">
                            <div class="col-sm-12">
                                <button class="btn-cart welcome-add-cart animated fadeInDown" type="submit">Place order</button>
                            </div>
                        </div>
                    </form>
                    </div>

                    <div class="col-sm-1"></div>

                    <div class="col-sm-5 checkout-order">
                        <div class="row">
                            <h2>Your order</h2>
                        </div>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($content as $key => $item)
                        
                            <div class="row mt-20px order @if($i == 0) first @endif {{ $i }}">
                                <div class="col-sm-8">{{ $item['name'] }} <strong class="quan">x {{ $item['quantity'] }}</strong></div>
                                <div class="col-sm-4 text-orange text-right">$ {{ number_format($item['price']*$item['quantity'], 2) }}</div>
                            </div>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                        <div class="row mt-20px total">
                            <div class="col-sm-8">Total</div>
                            <div class="col-sm-4 text-orange text-right">$ {{ $total }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->

    </section><!--/.populer-products-->
    <!--populer-products end-->

@endsection

@section('scripts')
        <link rel="stylesheet" href="{{ url('assets/country/css/countrySelect.min.css') }}">
        <script src="{{ url('assets/country/js/countrySelect.min.js') }}"></script>

        <script>
            $("#country_selector").countrySelect({
                defaultCountry:"us",
                defaultStyling:"inside"
            });
        </script>
@endsection

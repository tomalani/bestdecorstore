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
                        <form id="form-checkout">
                            @csrf
                        <div class="row">
                            <h2>Billing details</h2>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">First name <span>*</span></label>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="">
                            </div>
                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Last name <span>*</span></label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="">
                            </div>
                        </div>
                        <div class="row mt-20px">
                            <div class="col-sm-12">
                                <label for="country_selector" class="form-label">Country / Region <span>*</span></label>
                                <input id="country_selector" name="country_selector" type="text" class="form-control w-100">
                            </div>
                        </div>
                        <div class="row mt-20px">
                            <div class="col-sm-12">
                                <label for="address" class="form-label">Street address <span>*</span></label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="House number and street name">
                                <input type="text" class="form-control mt-10px" id="address2" name="address2" placeholder="Apartment, suite, unit, etc. (optional)">
                            </div>
                        </div>
                        <div class="row mt-20px">
                            <div class="col-sm-12">
                                <label for="city" class="form-label">Town/City <span>*</span></label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="">
                            </div>
                        </div>
                        <div class="row mt-20px">
                            <div class="col-sm-12">
                                <label for="state" class="form-label">State <span>*</span></label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="">
                            </div>
                        </div>
                        <div class="row mt-20px">
                            <div class="col-sm-12">
                                <label for="zipcode" class="form-label">Postcode/ZIP <span>*</span></label>
                                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="">
                            </div>
                        </div>
                        <div class="row mt-20px">
                            <div class="col-sm-12">
                                <label for="email" class="form-label">Email address <span>*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                            </div>
                        </div>
                        <div class="row mt-20px">
                            <div class="col-sm-12">
                                <label for="phone" class="form-label">Phone </label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="">
                            </div>
                        </div>
                        <div class="row mt-20px">
                            <div class="col-sm-12">
                                <button class="btn-cart welcome-add-cart animated fadeInDown" type="button" id="btn-submit">Place order</button>
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
        <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

        <script>
            $("#country_selector").countrySelect({
                defaultCountry:"us",
                defaultStyling:"inside"
            });

            function initAjaxSetupToken() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            }

            $('#btn-submit').on('click', function(e) {
            // handle bomb click
            e.preventDefault();
            // alertLoading("Loading")

            // form data
            const form = $('#form-checkout')[0];
            const formData = new FormData(form);

            url = '{{ route('order-save') }}'
            
            // set up ajax
            initAjaxSetupToken();

            $.ajax({
                url: url,
                dataType: 'json',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(res) {
                    if(res.status == 'Success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thank you for your order',
                            text: 'Your order has been placed successfully',
                            customClass: {
                                confirmButton: 'btn-sw-ok'
                            }
                        }).then(function() {
                            window.location = '{{ route('order-success') }}';
                        });
                    } else {
                        // logAjaxError(xhr, status, error);
                        alert('Please fill in form.');
                    }
                }
            })

    });
        </script>
@endsection

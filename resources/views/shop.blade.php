<!-- home.blade.php -->

@extends('layouts.layout_template')

@section('content')
    

    <!--populer-products start -->
    <section id="populer-products" class="populer-products mt-10 cart-container">
        <div class="container">
            <div class="populer-products-content">
                <div class="row">
                    <div class="col cart-header">
                        <h1 class="">Shop</h1>
                    </div>
                </div>
                
                <div class="row d-flex align-content-around flex-wrap align-content-start">
                    @foreach($products as $key => $product)
                        <livewire:product-block :product="$product" />
                    @endforeach
                </div>
            </div>
        </div><!--/.container-->

    </section><!--/.populer-products-->
    <!--populer-products end-->

@endsection

@section('scripts')

@endsection

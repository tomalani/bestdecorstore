<!-- home.blade.php -->

@extends('layouts.layout_template')

@section('content')
    

    <!--populer-products start -->
    <section id="populer-products" class="populer-products mt-10 cart-container">
        <div class="container">
            <div class="populer-products-content">
                <div class="row">
                    <div class="col cart-header">
                        <h1 class="">Your Cart</h1>
                    </div>
                </div>
                <livewire:cart-component />

            </div>
        </div><!--/.container-->

    </section><!--/.populer-products-->
    <!--populer-products end-->

@endsection

@section('scripts')

@endsection

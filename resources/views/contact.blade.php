<!-- home.blade.php -->

@extends('layouts.layout_template')

@section('content')
    

    <!--populer-products start -->
    <section id="populer-products" class="populer-products mt-10 cart-container">
        <div class="container">
            <div class="contact-container">
                <div class="row text-center">
                    <div class="col cart-header">
                        <h1 class="">Contact Us</h1>
                    </div>
                </div>
                
                <div class="row">
                    <form action="{{ route('contact-insert') }}">
                        @csrf
                        <div class="form-floating mb-5">
                            <input type="text" class="form-control" id="name" name="name" placeholder="John Doe">
                            <label for="name">Your name</label>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-5">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                            <label for="email">Email</label>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="message" name="message" placeholder="name@example.com"></textarea>
                            <label for="message">Message</label>
                            @error('message')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div><!--/.container-->

    </section><!--/.populer-products-->
    <!--populer-products end-->

@endsection

@section('scripts')

@endsection

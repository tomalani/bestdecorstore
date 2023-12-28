@extends('layouts.template_backend')

@section('content')
    <div class="container-fluid py-4">
        <form action="{{ url('/backend/products/update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $products->id }}">
            <div class="form-group">
                <label for="product_name" class="form-control-label">Product Name</label>
                <input class="form-control" value="{{ $products->product_name }}" type="text" id="product_name"
                    name="product_name">
            </div>
            <div class="form-group">
                <label for="product_description">Product Description</label>
                <textarea class="form-control" value="{{ $products->product_description }}" id="product_description" rows="3"
                    name="product_description">{{ $products->product_description }}</textarea>
            </div>
            <div class="form-group">
                <label for="product_code" class="form-control-label">Product Code</label>
                <input class="form-control" value="{{ $products->product_code }}" type="text" id="product_code"
                    name="product_code">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input class="form-control" value="{{ $products->price }}" type="text" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="price_full">Promo Price</label>
                <input class="form-control" value="{{ $products->price_full }}" type="text" id="price_full" name="price_full">
            </div>
            <div class="form-group">
                <label for="category" class="form-control-label">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach ($categories as $item)
                        <option @if ($products->category_id === $item->id) selected @endif value="{{ $item->id }}">
                            {{ $item->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="fcustomCheck1" name="is_highlight"
                    @if ($products->is_highlight == 1) checked @endif>
                <label class="custom-control-label" for="customCheck1">Highlight</label>
            </div>
            <div class="form-group">
                <label for="image1" class="form-control-label">Image1</label>
                <input class="form-control" type="file" name="image1" id="image1">
            </div>
            <div class="form-group">
                <label for="image2" class="form-control-label">Image2</label>
                <input class="form-control" type="file" name="image2" id="image2">
            </div>
            <div class="form-group">
                <label for="image3" class="form-control-label">Image3</label>
                <input class="form-control" type="file" name="image3" id="image3">
            </div>
            <div class="form-group">
                <label for="image4" class="form-control-label">Image4</label>
                <input class="form-control" type="file" name="image4" id="image4">
            </div>

            <button type="reset" class="btn btn-danger">
                Discard
            </button>
            <button type="submit" class="btn btn-success">
                Update Products
            </button>
        </form>
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            Copyright 2024 &copy; <a href="https://www.themesine.com/">BestDecorstore</a> All Rights
                            Reserved.
                        </div>
                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection

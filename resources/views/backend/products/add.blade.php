@extends('layouts.template_backend')

@section('content')
    <!-- Include Dropzone.js library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.css" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

    <div class="container-fluid py-4">
        <form action="{{ url('/backend/products/insert') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="product_name" class="form-control-label">Product Name</label>
                <input class="form-control" type="text" id="product_name" name="product_name">
            </div>
            <div class="form-group">
                <label for="product_description">Product Description</label>
                <textarea class="form-control" id="product_description" rows="3" name="product_description"></textarea>
            </div>
            <div class="form-group">
                <label for="product_code" class="form-control-label">Product Code</label>
                <input class="form-control" type="text" id="product_codeF" name="product_code">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input class="form-control" type="text" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="price_from">Promo Price</label>
                <input class="form-control" type="text" id="price_from" name="price_from">
            </div>
            <div class="form-group">
                <label for="category" class="form-control-label">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Form content -->
            <div class="dropzone" id="imageDropzone"></div>
            {{-- <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="fcustomCheck1" name="is_highlight">
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
            </div> --}}


            <button type="reset" class="btn btn-danger">
                Discard
            </button>
            <button type="submit" class="btn btn-success">
                Add Products
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

    <script>
        Dropzone.options.imageDropzone = {
            paramName: "image", // Name of the input field
            maxFilesize: 2, // Max filesize in MB
            addRemoveLinks: true, // Show remove links on uploaded images
            dictRemoveFile: "Remove", // Text for remove links
            url: "{{ url('/upload-url') }}", // Replace '/upload-url' with your actual upload route
            // Other configurations or event handlers as needed
        };
    </script>
@endsection

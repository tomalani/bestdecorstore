@extends('layouts.template_backend')

@section('content')
    <div class="container-fluid py-4">
        <form action="{{ url('/backend/categories/insert') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category_name" class="form-control-label">Category Name</label>
                <input class="form-control" type="text" id="category_name" name="category_name">
            </div>
            <div class="form-group">
                <label for="category_description">Category Description</label>
                <textarea class="form-control" id="category_description" rows="3" name="category_description"></textarea>
            </div>

            <button type="reset" class="btn btn-danger">
                Discard
            </button>
            <button type="submit" class="btn btn-success">
                Add Category
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

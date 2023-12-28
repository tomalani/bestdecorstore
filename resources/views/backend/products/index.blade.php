@extends('layouts.template_backend')

@section('content')
    <style>
        .text-pro-wrap,
        .text-cat-wrap {
            width: 250px;
            text-wrap: wrap;
        }

        .warp-img-table img {
            height: 150px;
            width: 150px;
            object-fit: contain;
        }

        /* .text-cat-wrap {
                                                            width: 500px;
                                                            text-wrap: wrap;
                                                        } */
    </style>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <h6>Products</h6>
                            </div>

                            <div class="col-lg-6 mb-lg-0 mb-4 text-end">
                                <a class="btn btn-primary" href="{{ url('/backend/products/add') }}">
                                    Add Products
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            >
                                            Product Image
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Product Name</th>
                                        {{-- <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Description</th> --}}
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Price</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Product Code</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Category</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $obj)
                                        <tr>
                                            <td>
                                                <div class="warp-img-table ">
                                                    @if ($key >= 3)
                                                        <img src="{{ url('assets/img/product/' . $obj->id . '.jpg') }}"
                                                            alt="slider image">
                                                    @else
                                                        <img src="{{ url('assets/img/product/' . $obj->id . '.png') }}"
                                                            alt="slider image">
                                                    @endif
                                                </div>

                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 text-pro-wrap">
                                                    {{ $obj->product_name }}</p>
                                            </td>
                                            {{-- <td>
                                                <p class="text-xs font-weight-bold mb-0 text-cat-wrap">
                                                    {{ $obj->product_description }}</p>
                                            </td> --}}
                                            <td class="align-middle text-center">
                                                <span class="text-xs font-weight-bold">${{ $obj->price }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $obj->product_code }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="badge bg-gradient-warning">{{ $obj->category_name }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex align-item-center justify-content-center gap-3">
                                                    <a href="{{ url('/backend/products/edit', $obj->id) }}"
                                                        class="btn btn-secondary font-weight-bold text-xs btn-tooltip"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                        data-container="body" data-animation="true">
                                                        Edit
                                                    </a>
                                                    <a href="{{ url('/backend/products/delete', $obj->id) }}"
                                                        class="btn btn-danger font-weight-bold text-xs btn-tooltip"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                        data-container="body" data-animation="true">
                                                        Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

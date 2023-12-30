@extends('layouts.template_backend')

@section('content')
    @if (session()->has('messageSuccess'))
        @php
            $messageDetail = session('messageDetail');
        @endphp
        <script>
            Swal.fire({
                title: "Successfully!",
                text: "{{ $messageDetail }}",
                icon: "success",
            });
        </script>
    @elseif (session()->has('messageFail'))
        @php
            $messageDetail = session('messageDetail');
        @endphp
        <script>
            Swal.fire({
                title: "Created failed!",
                text: "{{ $messageDetail }}",
                icon: "error",
            });
        </script>
    @endif
    <style>
        .brap {
            display: inline-block;
            padding: 0.55em 0.9em;
            font-size: 0.75em;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.45rem;
        }

        .brap.badges-primary {
            color: #a3017e;
            background-color: #f883dd;
        }

        .brap.badges-secondary {
            color: #5974a2;
            background-color: #e4e8ed;
        }

        .brap.badges-info {
            color: #08a1c4;
            background-color: #abe9f7;
        }

        .brap.badges-success {
            color: #67b108;
            background-color: #cdf59b;
        }

        .brap.badges-danger {
            color: #bd0000;
            background-color: #fc9797;
        }

        .brap.badges-warning {
            color: #fbc400;
            background-color: #fef5d3;
        }

        .brap.badges-light {
            color: #c7d3de;
            background-color: #fff;
        }

        .brap.badges-dark {
            color: #1e2e4a;
            background-color: #8097bf;
        }

        .block-detail-img img {
            height: 100px;
            width: 100px;
        }

        .fs-order-txt {
            font-size: 24px;
        }

        .fs-order-number {
            font-size: 24px;
            font-weight: 600;
        }

        .txt-bold {
            font-weight: 600;
        }

        .txt-total {
            font-size: 18px !important;
            font-weight: 700 !important;
            color: black;
        }

        .txt-delivery {
            color: #67b108
        }
    </style>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row align-items-center justify-content-lg-between">
                            <h6>Orders</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            OrderNumber</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            User</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Created At</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Updated At</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key => $obj)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $obj->order_number }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $obj->name }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="brap badges-primary">Order</span>
                                                {{-- @if ($obj->status == 1)
                                                    <span class="brap badges-primary">Order</span>
                                                @elseif($obj->status == 2)
                                                    <span class="brap badges-warning">Prepare</span>
                                                @elseif($obj->status == 3)
                                                    <span class="brap badges-secondary">Shipped</span>
                                                @elseif($obj->status == 4)
                                                    <span class="brap badges-success">Delivered</span>
                                                @elseif($obj->status == 0)
                                                    <span class="brap badges-danger">Cancel</span>
                                                @endif --}}
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $obj->created_at }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $obj->updated_at }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex align-item-center justify-content-center gap-3">
                                                    <a data-id="{{ $obj->id }}"
                                                        data-customer-name="{{ $obj->name }}"
                                                        data-customer-tel="{{ $obj->user_phone }}"
                                                        data-customer-address="{{ $obj->address }}"
                                                        data-customer-address2="{{ $obj->address2 }}"
                                                        data-customer-city="{{ $obj->city }}"
                                                        data-customer-state="{{ $obj->state }}"
                                                        data-customer-postal ="{{ $obj->zipcode }}"
                                                        data-customer-country ="{{ $obj->country }}"
                                                        data-customer-email ="{{ $obj->email }}"
                                                        class="btn btn-success font-weight-bold text-xs confirm-orders"
                                                        data-toggle="tooltip" data-original-title="View">
                                                        View
                                                    </a>
                                                </div>
                                                {{-- @if ($obj->status == 1)
                                                    <div class="d-flex align-item-center justify-content-center gap-3">
                                                        <a data-id="{{ $obj->id }}"
                                                            data-customer-name="{{ $obj->name }}"
                                                            data-customer-tel="{{ $obj->user_phone }}"
                                                            data-customer-address="{{ $obj->address }}"
                                                            class="btn btn-success font-weight-bold text-xs confirm-orders"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Confrim
                                                        </a>
                                                        <a href="{{ url('/backend/orders/reject-order', $obj->id) }}"
                                                            class="btn btn-danger font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Reject
                                                        </a>
                                                    </div>
                                                @elseif($obj->status == 2)
                                                    <div class="d-flex align-item-center justify-content-center gap-3">
                                                        <a data-id="{{ $obj->id }}"
                                                            class="btn btn-success font-weight-bold text-xs  shipped-orders"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Shipped
                                                        </a>
                                                    </div>
                                                @elseif($obj->status == 3)
                                                    <div class="d-flex align-item-center justify-content-center gap-3">
                                                        <a data-id="{{ $obj->id }}"
                                                            class="btn btn-info font-weight-bold text-xs delivery-orders"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Delivered
                                                        </a>
                                                    </div>
                                                @elseif($obj->status == 4)
                                                    <div class="d-flex align-item-center justify-content-center gap-3">
                                                        <button href="{{ url('/backend/categories/edit', $obj->id) }}"
                                                            class="btn btn-dark font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user" disabled>
                                                            complete
                                                            </a>
                                                    </div>
                                                @elseif($obj->status == 0)
                                                    <div class="d-flex align-item-center justify-content-center gap-3">
                                                        <button href="{{ url('/backend/categories/edit', $obj->id) }}"
                                                            class="btn btn-danger font-weight-bold text-xs" disabled>
                                                            Cancle
                                                            </a>
                                                    </div>
                                                @endif --}}
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

        <div class="modal fade" id="confirm_order_table" tabindex="-1" role="dialog" aria-labelledby="confirm_order"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content ">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="exampleModalLabel">Order Details </h5>
                        {{-- <h5 class="modal-title" id="exampleModalLabel">Confirm Order</h5> --}}
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body border-0">
                        <div class="info-order">
                            <div class="d-flex block-detail-img">
                                <div class="w-50"><img src="{{ url('assets/images/icons/clipboard.png') }}"
                                        alt=""></div>

                                <div class="right-info text-right w-50">
                                    <div class="order-number-txt">
                                        <span class="fs-order-txt">Order </span>
                                        <span class="fs-order-number"> 123123123</span>
                                    </div>
                                    <div>
                                        <span>Issue date :</span><span class="txt-bold">Order</span>
                                    </div>
                                    <div>
                                        <span>Status :</span> <span class="txt-bold">Order</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="d-flex align-items-center justify-content-start gap-2">
                            Customer Name : <span class="customer-name-con"></h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            Phone : <span class="customer-phone-con"></h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            Address : <span class="customer-address-con"></h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            Address2 : <span class="customer-address2-con"></h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            City : <span class="customer-city-con"></h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            State/Province : <span class="customer-state-con"></h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            Zip/Postal Code : <span class="customer-postal-con"></h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            Country : <span class="customer-country-con"></h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            Email : <span class="customer-email-con"></h4>
                        </div> --}}
                    </div>
                    <form action="{{ url('backend/orders/confirm-order') }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" id="order-id-confirm">
                        <div class="modal-body p-0 border-0">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="confirm-data-order-table">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Product Name</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Quantity</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Price</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tr-confirm">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body border-0">
                            <h4 class="txt-delivery">Delivery To</h4>
                            <div>
                                <span id="delivery-info-txt" class=""></span>
                            </div>
                            <div>
                                <span>Mobile - </span><span id="contact-info"></span>
                            </div>
                            <div>
                                <span>Name - </span><span id="name-customer-info"></span>
                            </div>
                        </div>
                        <div class="modal-footer border-0 confirm-group-btn">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="shipped_order_table" tabindex="-1" role="dialog" aria-labelledby="confirm_order"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Shipped</h5>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('backend/orders/shipped-order') }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" id="order-id-confirm">
                        <div class="modal-body">
                            <h3>Confirm Shipped Order ?</h3>
                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</a>
                                <button type="submit" class="btn bg-gradient-primary"
                                    id="confirmButton">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="delivery_order_table" tabindex="-1" role="dialog" aria-labelledby="confirm_order"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Delivery</h5>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('backend/orders/delivery-order') }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" id="order-id-confirm">
                        <div class="modal-body">
                            <h3>Confirm Delivery Order ?</h3>
                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</a>
                                <button type="submit" class="btn bg-gradient-primary"
                                    id="confirmButton">Confirm</button>
                        </div>
                    </form>
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Your code here
            console.log("Document is ready!");

            // Example: Attach a click event to a button
            $(".confirm-orders").click(function() {
                // Get the data-id attribute of the clicked element
                const orderId = $(this).attr('data-id');
                const customName = $(this).attr('data-customer-name')
                const customPhone = $(this).attr('data-customer-tel')
                const customAddress = $(this).attr('data-customer-address')
                const customAddress2 = $(this).attr('data-customer-address2')
                const customCity = $(this).attr('data-customer-city')
                const customsState = $(this).attr('data-customer-state')
                const customPostal = $(this).attr('data-customer-postal')
                const customCountry = $(this).attr('data-customer-country')
                const customEmail = $(this).attr('data-customer-email')
                // Make an AJAX request
                $.ajax({
                    url: '/backend/ajax-orders-item', // Replace with your actual API endpoint
                    method: 'GET',
                    data: {
                        orderId: orderId
                    },
                    success: function(response) {
                        const data = response;
                        let sum_table = 0;
                        const dataRow = data?.map((d) => {
                            const total = d.quantity * d.price
                            sum_table += total
                            const STR_TR = `<tr>
                                                <td>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-xs">${d.product_name}</h6>
                                                    </div>
                                                </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">${d.quantity}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">$ ${(d.price).toFixed(2)}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-xs font-weight-bold mb-0">$ ${(total).toFixed(2)}</p>
                                            </td>
                                        </tr>`
                            return STR_TR
                        })

                        const tr_sum = `<tr>
                                                <td>
                                                    <p class="text-xs txt-total font-weight-bold mb-0">Total : </p>
                                                </td>
                                            <td>
                                               
                                            </td>
                                            <td>
                                               
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-xs txt-total font-weight-bold mb-0">$ ${(sum_table).toFixed(2)}</p>
                                            </td>
                                        </tr>`
                        const groupBtn = `<a href="${window.location.origin}/backend/orders/reject-order/${orderId}" class="btn bg-gradient-danger" >Reject</a>
                  <button type="submit" class="btn bg-gradient-primary" id="confirmButton">Confirm</button>`;

                        // $('.confirm-group-btn').html(groupBtn)
                        $('#tr-confirm').html(dataRow.join('') + tr_sum);
                        $(".customer-name-con").html(customName)
                        $(".customer-phone-con").html(customPhone)
                        $(".customer-address-con").html(customAddress)
                        $(".customer-address2-con").html(customAddress2)
                        $(".customer-city-con").html(customCity)
                        $(".customer-state-con").html(customsState)
                        $(".customer-postal-con").html(customPostal)
                        $(".customer-country-con").html(customCountry)
                        $(".customer-email-con").html(customEmail)
                        $("#order-id-confirm").val(orderId)

                        const addressInfo =
                            `${customPostal} Village ${customAddress}, ${customAddress2 ? customAddress2+',':'' } ${customsState}, ${customCity}, ${customCountry}`
                        $("#delivery-info-txt").html(addressInfo)

                        $("#contact-info").html(customPhone)
                        $("#name-customer-info").html(customName)
                        // Show modal
                        $('#confirm_order_table').modal('show');
                    },
                    error: function(error) {
                        // Handle any errors that occurred during the AJAX request
                        console.error('Error:', error);
                    }
                });
            });

            $(".shipped-orders").click(function() {
                const orderId = $(this).attr('data-id');
                $("#order-id-confirm").val(orderId)
                $('#shipped_order_table').modal('show');
            })
            $(".delivery-orders").click(function() {
                const orderId = $(this).attr('data-id');
                $("#order-id-confirm").val(orderId)
                $('#delivery_order_table').modal('show');
            })
        });
    </script>
@endsection

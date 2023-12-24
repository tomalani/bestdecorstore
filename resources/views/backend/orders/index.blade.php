@extends('layouts.template_backend')

@section('content')
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
                                                @if ($obj->status == 1)
                                                    <span class="brap badges-primary">Order</span>
                                                @elseif($obj->status == 2)
                                                    <span class="brap badges-warning">Prepare</span>
                                                @elseif($obj->status == 3)
                                                    <span class="brap badges-secondary">Shipped</span>
                                                @elseif($obj->status == 4)
                                                    <span class="brap badges-success">Delivered</span>
                                                @elseif($obj->status == 0)
                                                    <span class="brap badges-danger">Cancle</span>
                                                @endif
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
                                                @if ($obj->status == 1)
                                                    <div class="d-flex align-item-center justify-content-center gap-3">
                                                        <a data-id="{{ $obj->id }}"
                                                            data-customer-name="{{ $obj->name }}"
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
                                                @endif
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

        // confrim order
        <div class="modal fade" id="confirm_order_table" tabindex="-1" role="dialog" aria-labelledby="confirm_order"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Order</h5>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <h4 class="customer-name-con"></h4>
                        </div>
                    </div>
                    <form action="{{ url('backend/orders/confirm-order') }}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" id="order-id-confirm">
                        <div class="modal-body">
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
                        <div class="modal-footer confirm-group-btn">

                        </div>
                    </form>
                </div>
            </div>
        </div>

        // confrim shipped
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

        // confrim delivery
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
                                                   
                                                </td>
                                            <td>
                                               
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">Total : </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-xs font-weight-bold mb-0">$ ${(sum_table).toFixed(2)}</p>
                                            </td>
                                        </tr>`
                        const groupBtn = `<a href="${window.location.origin}/backend/orders/reject-order/${orderId}" class="btn bg-gradient-danger" >Reject</a>
                  <button type="submit" class="btn bg-gradient-primary" id="confirmButton">Confirm</button>`;

                        $('.confirm-group-btn').html(groupBtn)
                        $('#tr-confirm').html(dataRow.join('') + tr_sum);
                        $(".customer-name-con").html(customName)
                        $("#order-id-confirm").val(orderId)
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

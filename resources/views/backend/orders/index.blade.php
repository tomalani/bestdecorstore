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
                                                        <a data-bs-toggle="modal" data-bs-target="#confirm_order"
                                                            class="btn btn-success font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Confrim
                                                        </a>
                                                        <a href="{{ url('/backend/categories/edit', $obj->id) }}"
                                                            class="btn btn-danger font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Reject
                                                        </a>
                                                    </div>
                                                @elseif($obj->status == 2)
                                                    <div class="d-flex align-item-center justify-content-center gap-3">
                                                        <a href="{{ url('/backend/categories/edit', $obj->id) }}"
                                                            class="btn btn-success font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Shipped
                                                        </a>
                                                        <a href="{{ url('/backend/categories/edit', $obj->id) }}"
                                                            class="btn btn-danger font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Reject
                                                        </a>
                                                    </div>
                                                @elseif($obj->status == 3)
                                                    <div class="d-flex align-item-center justify-content-center gap-3">
                                                        <a href="{{ url('/backend/categories/edit', $obj->id) }}"
                                                            class="btn btn-info font-weight-bold text-xs"
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
        <div class="modal fade" id="confirm_order" tabindex="-1" role="dialog" aria-labelledby="confirm_order"
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
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Project</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Budget</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Status</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Completion</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div>
                                                        <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/logos/small-logos/logo-spotify.svg"
                                                            class="avatar avatar-sm rounded-circle me-2">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-xs">Spotify</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">$2,500</p>
                                            </td>
                                            <td>
                                                <span class="badge badge-dot me-4">
                                                    <i class="bg-info"></i>
                                                    <span class="text-dark text-xs">working</span>
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2 text-xs">60%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 60%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-middle">
                                                <button class="btn btn-link text-secondary mb-0">
                                                    <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div>
                                                        <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/logos/small-logos/logo-invision.svg"
                                                            class="avatar avatar-sm rounded-circle me-2">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-xs">Invision</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">$5,000</p>
                                            </td>
                                            <td>
                                                <span class="badge badge-dot me-4">
                                                    <i class="bg-success"></i>
                                                    <span class="text-dark text-xs">done</span>
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2 text-xs">100%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 100%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-middle">
                                                <button class="btn btn-link text-secondary mb-0" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div>
                                                        <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/logos/small-logos/logo-jira.svg"
                                                            class="avatar avatar-sm rounded-circle me-2">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-xs">Jira</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">$3,400</p>
                                            </td>
                                            <td>
                                                <span class="badge badge-dot me-4">
                                                    <i class="bg-danger"></i>
                                                    <span class="text-dark text-xs">canceled</span>
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2 text-xs">30%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                aria-valuenow="30" aria-valuemin="0" aria-valuemax="30"
                                                                style="width: 30%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-middle">
                                                <button class="btn btn-link text-secondary mb-0" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div>
                                                        <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/logos/small-logos/logo-slack.svg"
                                                            class="avatar avatar-sm rounded-circle me-2">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-xs">Slack</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">$1,000</p>
                                            </td>
                                            <td>
                                                <span class="badge badge-dot me-4">
                                                    <i class="bg-danger"></i>
                                                    <span class="text-dark text-xs">canceled</span>
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2 text-xs">0%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"
                                                                style="width: 0%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-middle">
                                                <button class="btn btn-link text-secondary mb-0" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div>
                                                        <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/logos/small-logos/logo-webdev.svg"
                                                            class="avatar avatar-sm rounded-circle me-2">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-xs">Webdev</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">$14,000</p>
                                            </td>
                                            <td>
                                                <span class="badge badge-dot me-4">
                                                    <i class="bg-info"></i>
                                                    <span class="text-dark text-xs">working</span>
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2 text-xs">80%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="80"
                                                                style="width: 80%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-middle">
                                                <button class="btn btn-link text-secondary mb-0" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div>
                                                        <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/logos/small-logos/logo-xd.svg"
                                                            class="avatar avatar-sm rounded-circle me-2">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-xs">Adobe XD</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">$2,300</p>
                                            </td>
                                            <td>
                                                <span class="badge badge-dot me-4">
                                                    <i class="bg-success"></i>
                                                    <span class="text-dark text-xs">done</span>
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2 text-xs">100%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 100%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-middle">
                                                <button class="btn btn-link text-secondary mb-0" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-xs" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Reject</button>
                        <button type="button" class="btn bg-gradient-primary">Confirm</button>
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

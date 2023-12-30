@extends('layouts.template_backend')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <h6>Contacts</h6>
                            </div>

                            <div class="col-lg-6 mb-lg-0 mb-4 text-end">

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
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Email</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Message</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Created At</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $key => $obj)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $obj->name }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $obj->email }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $obj->message }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $obj->created_at }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ url('/backend/contact/edit', $obj->id) }}"
                                                    class="btn btn-success font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user" data-id="{{ $obj->id }}">
                                                    View
                                                </a>
                                                <a id="del-contact-message" class="btn btn-danger font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user"
                                                    data-id="{{ $obj->id }}">
                                                    Delete
                                                </a>
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

    <div class="modal fade" id="confirm_delete_contact" tabindex="-1" role="dialog"
        aria-labelledby="confirm_delete_contact" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delect-contacts') }}" method="POST">
                    @csrf
                    <input type="hidden" name="contact_id" id="contact_id">
                    <div class="modal-body border-0">
                        <h3>Confirm</h3>
                        <span>are you sure you want to do this?</span>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</a>
                            <button type="submit" class="btn bg-gradient-primary" id="confirmButton">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#del-contact-message').on('click', function() {
                const contactId = $(this).attr('data-id')
                $('#contact_id').val(contactId);
                $('#confirm_delete_contact').modal('show');

            })
        })
    </script>
@endsection

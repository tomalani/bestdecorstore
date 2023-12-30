@extends('layouts.template_backend')

@section('content')
    <style>
        .avatar-pic .avatar {
            background: #cb0c9f;
            width: 50px;
            height: 50px;
            border-radius: 50%
        }
        .txt-email{
            font-size: 14px;
        }
    </style>
    <div class="container-fluid py-4">
        <input class="form-control" type="hidden" value="{{ $contact->id }}" id="id" name="id">
        <div class="d-flex gap-4 p-5 bg-white">
            <div class="avatar-pic">
                <span class="avatar">{{ $firstUpperCase = strtoupper(substr($contact->name, 0, 1)) }}</span>
            </div>
            <div>
                <div>
                    <span>{{ ucwords($contact->name) }}</span>
                </div>
                <div>
                    <span class="txt-email">{{ ucwords($contact->email) }}</span>
                </div>
            </div>
        </div>
        <div class="pt-2 p-5 bg-white"">
            <div class="header-txt">
                Message :
            </div>
            <div>
                <span class="txt-email">{{ ucwords($contact->message) }}</span>
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

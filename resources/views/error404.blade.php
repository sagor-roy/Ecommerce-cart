@extends('layouts.master')
@section('content')
    @if(session('type'))
        <div class="alert alert-danger">{{ session('type') }}</div>
    @endif
    <section>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="card mt-4">
                            <img src="{{ asset('asset/img/LHS-banner.jpg') }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card mt-4">
                            <img src="{{ asset('asset/img/banner-side.png') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="card my-4">
                            <div class="card-body">
                                <h3>404 page not found</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

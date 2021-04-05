@extends('layouts.master')

@section('content')

    <section>
        <div class="login mt-4">
            <div class="row">
                <div class="col-lg-6 col-md-6 mx-auto">
                    @if(session('message'))
                        <div class="alert alert-{{ session('type') == 'success' ? 'success':'danger' }} alert-dismissible fade show" role="alert">
                            <strong>{{ session('type') == 'success' ? 'Success':'Sorry' }} ! </strong> {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-center">Registration</h4>
                            <hr>
                            <form method="POST" action="{{ route('customer.register') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="name" type="text" class="custom_field @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email" class="custom_field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="" type="number" class="custom_field @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" placeholder="Enter number">

                                    @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="custom_field @error('password') is-invalid @enderror" name="password" placeholder="Enter password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="custom_field" name="password_confirmation" placeholder="Enter confirm password">
                                </div>
                                <input type="submit" class="btn btn-primary  custom_btn" value="Register">
                            </form>
                            <a class="float-right" href="{{ route('customer.login') }}">Already account?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

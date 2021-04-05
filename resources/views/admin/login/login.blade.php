<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:05:33 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Login</title>
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('admin/favicon/apple-icon-120x120.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('admin/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('admin/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/favicon/favicon-16x16.png') }}">
    <!--load progress bar-->
    <script src="{{ asset('admin/vendor/pace/pace.min.js') }}"></script>
    <link href="{{ asset('admin/vendor/pace/pace-theme-minimal.css') }}" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendor/animate.css/animate.css') }}">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="{{ asset('admin/vendor/toastr/toastr.min.css') }}">
    <!--Magnific popup-->
    <link rel="stylesheet" href="{{ asset('admin/vendor/magnific-popup/magnific-popup.css') }}">
    <!--dataTable-->
    <link rel="stylesheet" href="{{ asset('admin/vendor/data-table/media/css/dataTables.bootstrap.min.css') }}">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('admin/stylesheets/css/style.css') }}">
    <!--seewtaler-->
    <link rel="stylesheet" href="{{ asset('admin/vendor/sweetalert/sweetalert.css') }}">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo text-center">
            <h2>Admin</h2>
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                @if(session('message'))
                    <div class="alert alert-{{ session('type') == 'success' ? 'success':'danger' }}">{{ session('message') }}</div>
                @endif
                <div class="panel-content bg-scale-0">
                    <form method="POST" action="{{ route('admin.dashboard') }}">
                        @csrf
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                                <i class="fa fa-envelope"></i>
                            </span>
                            @error('email')
                            <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                               <input id="password" placeholder="Enter your password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                <i class="fa fa-key"></i>
                            </span>
                            @error('password')
                            <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <a href="">Forgot password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<script src="{{ asset('admin/vendor/jquery/jquery-1.12.3.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/vendor/nano-scroller/nano-scroller.js') }}"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="{{ asset('admin/javascripts/template-script.min.js') }}"></script>
<script src="{{ asset('admin/javascripts/template-init.min.js') }}"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
<!--Notification msj-->
<script src="{{ asset('admin/vendor/toastr/toastr.min.js') }}"></script>
<!--morris chart-->
<script src="{{ asset('admin/vendor/chart-js/chart.min.js') }}"></script>
<!--Gallery with Magnific popup-->
<script src="{{ asset('admin/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<!--dataTable-->
<script src="{{ asset('admin/vendor/data-table/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/data-table/media/js/dataTables.bootstrap.min.js') }}"></script>
<!--Examples-->
<script src="{{ asset('admin/javascripts/examples/tables/data-tables.js') }}"></script>
<!--Examples-->
<script src="{{ asset('admin/javascripts/examples/dashboard.js') }}"></script>

<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:05:37 GMT -->
</html>

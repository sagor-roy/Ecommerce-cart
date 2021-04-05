<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/all.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('asset/css/resposive.css') }}">
    <title>Ecommerce Shop</title>
</head>
<body>
<head>
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ route('home') }}">BDSHOP</a>
                <div class="text-right d-inline-flex">
                    <div class="wish-shopping mr-2">
                        <a class="" href=""> <i class="fa fa-heart"></i></a><span class="wish">0</span>

                        <i class="fa fa-shopping-cart text-white bg-success"></i><a id="taka" class="bg-success" href="{{ route('cart') }}">&#2547;</a><span id="shopping" class="shopping"></span>

                        {{-- <a class="bg-success" href="{{ route('cart') }}"> <i class="fa fa-shopping-cart"></i>  {{ number_format($total) }} &#2547;</a><span class="shopping">{{ $qty }}</span> --}}
                    </div>
                    @if(session('customer'))
                    <div class="dropdown">
                        <button class="btn dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            $customer =  \App\Models\Customer::where('id','=',session('customer'))->first();
                            ?>
                            <i class="fas fa-user"></i> {{ $customer->name }}
                        </button>
                        <div style="min-width: 7rem;" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('customer.profile') }}">Profile</a>
                            <form action="{{ route('customer.logout') }}" method="post">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                    @else
                        <a class="btn btn-sm text-white" href="{{ route('customer.login') }}">Login</a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</head>

{{-- <div class="container">
    <div class="chating">
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
               <div class="chating-body">
                   <div class="left-side">
                       hello world
                   </div>
                   <div class="right-side">
                       how are you
                   </div>
               </div>
               <div class="chating-footer">
                   <form action="">
                       <input class="form-control" type="text" name="" placeholder="typing....">
                       <button type="submit" class="btn btn-primary">send</button>
                   </form>
               </div>
            </div>
        </div>
    </div>
</div> --}}

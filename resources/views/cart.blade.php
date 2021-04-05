@extends('layouts.master')

@section('content')

    <section>
        <div class="login mt-4">
            <div class="container">
                @if(session('messages'))
                    <div class="alert alert-{{ session('type') == 'success' ? 'success':'danger' }} alert-dismissible fade show" role="alert">
                        <strong>{{ session('type') == 'success' ? 'Success':'Sorry' }} ! </strong> {{ session('messages') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Shopping-Cart</h4>
                        <hr>
                        <table class="table table-bordered text-center table-responsive-sm table-responsive-md table-bg">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Code</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product as $row)
                            <tr>
                                <td><img width="65px" src="{{ $row->product->f_img }}" alt=""></td>
                                <td>{{ $row->product->name }}</td>
                                <td>{{ $row->product->code }}</td>
                                <td>{{ number_format($row->price) }}&#2547;</td>
                                <td>
                                    <form action="{{ route('cart.update') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $row->id }}">
                                        <input type="hidden" name="product_id" value="{{ $row->product_id }}">
                                        <input style="width: 20%;" type="number" name="qty" value="{{ $row->qty }}" min="1" max="10">
                                        <button type="submit">Update</button>
                                    </form>
                                </td>
                                <td>{{ number_format($row->qty * $row->price) }}&#2547;</td>
                                <td>
                                    <form action="{{ route('cart.delete',$row->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button style="margin-top: 10px;" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a class="btn btn-secondary" href="{{ route('home') }}">Continue Shopping</a>
                    </div>
                </div>
                <div class="row  my-4">
                    @if(session('discount'))
                    @else
                    <div class="col-lg-4 col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5>Coupon</h5>
                                <hr>
                                <form action="{{ route('coupon') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="coupon" class="custom_field" placeholder="Enter coupon name">
                                        @error('coupon')
                                        <span class="text-danger font-italic">{{ $message }}</span>
                                        @enderror
                                        @if(session('message'))
                                            <span class="text-danger font-italic">{{ session('message') }}</span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary border-0">Apply</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    <?php
                    $total = \App\Models\Cart::all()->where('user_id',session('customer'))->where('session_id',session()->getId())->sum(function ($t){
                        return $t->price * $t->qty;
                    });
                        $dis = $total * session('discount') / 100;
                    ?>
                    <div class="col-lg-5 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>:</td>
                                        <td>{{ number_format($total) }}&#2547;</td>
                                    </tr>
                                    @if(session('discount'))
                                    <tr>
                                        <td>Coupon <a class="btn btn-sm btn-danger" href="{{ route('coupon.destroy') }}">remove</a></td>
                                        <td>:</td>
                                        <td>{{ session('discount') }}% ({{ number_format($dis) }}&#2547;)</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>:</td>
                                        <td>{{ number_format($total - $dis) }}&#2547;</td>
                                    </tr>
                                    @else
                                    @endif
                                    </tbody>
                                </table>
                                <a href="{{ route('checkout') }}" class="bg-success text-white form-control">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

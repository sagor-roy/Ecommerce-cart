@extends('layouts.master')

@section('content')

    <section>
        <div class="login mt-4">
            <div class="container">
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
                        <h4 class="text-center">Checkout</h4>
                        <hr>
                        <form action="{{ route('order.success') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-7 col-md-7">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Shipping-Zone</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" {{ old('name') }} class="custom_field" name="name" value="{{ $customerInfo->name }}">
                                                        @error('name')
                                                        <span class="text-danger font-italic">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" {{ old('email') }} class="custom_field" name="email" value="{{ $customerInfo->email }}">
                                                        @error('email')
                                                        <span class="text-danger font-italic">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="number" {{ old('number') }} class="custom_field" name="number" value="0{{ $customerInfo->number }}">
                                                        @error('number')
                                                        <span class="text-danger font-italic">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" {{ old('city') }} class="custom_field" name="city" placeholder="Enter city">
                                                        @error('city')
                                                        <span class="text-danger font-italic">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" {{ old('address') }} class="custom_field" name="address" placeholder="Enter Address">
                                                        @error('address')
                                                        <span class="text-danger font-italic">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <select name="country" id="" class="form-control custom">
                                                            <option value="">Select Country</option>
                                                            <option {{ old('country') == 'bangladesh' ? 'selected':'' }} value="bangladesh">Bangladesh</option>
                                                            <option {{ old('country') == 'india' ? 'selected':'' }} value="india">India</option>
                                                            <option {{ old('country') == 'nepal' ? 'selected':'' }} value="nepal">Nepal</option>
                                                        </select>
                                                        @error('country')
                                                        <span class="text-danger font-italic">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="number" class="custom_field" name="post_code" placeholder="Enter postal code" {{ old('post_code') }}>
                                                        @error('post_code')
                                                        <span class="text-danger font-italic">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="btn text-white btn-secondary" href="{{ route('cart') }}">Back</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $total = \App\Models\Cart::all()->where('user_id',session('customer'))->where('session_id',session()->getId())->sum(function ($t){
                                    return $t->price * $t->qty;
                                });
                                $dis = $total * session('discount') / 100;
                                ?>
                                <input type="hidden" name="subtotal" value="{{ $total }}">
                                <input type="hidden" name="discount" value="{{ session('discount') }}">
                                <input type="hidden" name="total" value="{{ $total-$dis }}">
                                <div class="col-lg-5 col-md-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4>Your Payment:</h4>
                                            <table class="table table-bordered">
                                                <tbody>
                                                @foreach($check as $rows)
                                                <tr>
                                                    <th>{{ $rows->product->name }} ({{ $rows->qty }})</th>
                                                    <th>{{ number_format($rows->qty * $rows->price) }}&#2547;</th>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td>Subtotal</td>
                                                    <td>:</td>
                                                    <td>{{ number_format($total) }}&#2547;</td>
                                                </tr>
                                                @if(session('discount'))
                                                    <tr>
                                                        <td>Discount</td>
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
                                            <hr>
                                            <div class="payment_method my-3">
                                                <h6>Payment Method :</h6>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="payment" id="inlineRadio1" value="hand-cash" {{ old('cash') == 'hand-cash' ? 'checked':'' }}>
                                                    <label for="inlineRadio1" class="form-check-label">Hand-Cash</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="inlineRadioOptions" id="inlineRadio2" value="1" disabled>
                                                    <label for="inlineRadio2" class="form-check-label">Bkash</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="inlineRadioOptions" id="inlineRadio3" value="1" disabled>
                                                    <label for="inlineRadio3" class="form-check-label">Paypal</label>
                                                </div>
                                                <br>
                                                @error('payment')
                                                <span class="text-danger font-italic">{{ $message }}</span>
                                                @enderror
                                            </div>
                                                <button type="submit" class="bg-success text-white form-control">Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

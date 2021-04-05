@extends('admin.layout.master-layout')
@section('title')
     Order Details
    @endsection

@section('content')
        <!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Order Details</a></li>
        </ul>
    </div>
</div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--Panel STATES-->
    <div class="row">
        <!--Panel SUCCESS-->
        <div class="col-sm-12">
            @if(session('delMessage'))
                <div class="alert alert-{{ session('type') }} fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>{{ session('type') == 'success' ? 'Success':'Error' }} !</strong> {{ session('delMessage') }}
                </div>
            @endif
            <div class="panel">
                <div class="panel-header panel-success">
                    <h3 class="panel-title">Order Details</h3>
                    <div class="panel-actions">
                        <ul>
                            <li class="action toggle-panel panel-expand"><span></span></li>
                            <li class="action"><span class="fa fa-bars action" aria-hidden="true"></span></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image text-center">
                               @foreach($shipping as $row)
                                   <?php
                                    $orders = \App\Models\Frontend\Order::find($row->order_id);
                                    $customer = \App\Models\Frontend\Customer::find($orders->user_id);
                                    ?>
                                   @endforeach
                                @if($customer->image)
                                <img style="border-radius: 50px;" width="100px" height="100px" src="{{ asset($customer->image) }}" alt="Profile">
                                   @else
                                <img width="80px" src="{{ asset('frontend/user.png') }}" alt="Profile">
                                    @endif
                            </div>
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover text-center" cellspacing="0" width="100%">
                                <tbody>
                                @foreach($shipping as $row)
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $row->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $row->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Number</td>
                                        <td>+880{{ $row->number }}</td>
                                    </tr>
                                 <tr>
                                        <td>Country</td>
                                        <td>{{ $row->country }}</td>
                                    </tr>
                                 <tr>
                                        <td>City</td>
                                        <td>{{ $row->city }}</td>
                                    </tr>
                                 <tr>
                                        <td>Address</td>
                                        <td>{{ $row->address }}</td>
                                    </tr>
                                <tr>
                                        <td>Post Code</td>
                                        <td>{{ $row->post_code }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                <a class="btn btn-warning" href="{{ route('admin.order.order') }}">Back</a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover text-center" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Brand Name</th>
                                    <th>Brand Code</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                    <tbody>
                                    @foreach($orderItem as $order)
                                    <tr>
                                        <td><img width="50px" src="{{ asset($order->product->first_image) }}" alt="product"></td>
                                        <?php
                                        $brand = \App\Models\Admin\Brand::find($order->product->brand_id);
                                        ?>
                                        <td>{{ $brand->brand }}</td>
                                        <td>{{ $brand->brand_code }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td><a class="btn btn-sm btn-primary" href="{{ route('productDetail',$order->product->id) }}">view</a></td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
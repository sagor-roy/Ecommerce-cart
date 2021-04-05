@extends('admin.layout.master-layout')
@section('title')
    Manage Product
    @endsection

@section('content')
        <!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Manage Product</a></li>
        </ul>
    </div>
</div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--Panel STATES-->
    <div class="row">
        <!--Panel SUCCESS-->
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-header panel-success">
                    <h3 class="panel-title">Manage Product</h3>
                    <div class="panel-actions">
                        <ul>
                            <li class="action toggle-panel panel-expand"><span></span></li>
                            <li class="action"><span class="fa fa-bars action" aria-hidden="true"></span></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover text-center" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Product Name</th>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Dis. Price</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->code }}</td>
                                <td>{{ substr($row->desc,0,15).'.....' }}</td>
                                <td>{{ $row->stock }}</td>
                                <td>{{ number_format($row->price) }}&#2547;</td>
                                @if($row->discount == null)
                                    <td>No</td>
                                @else
                                    <td>{{ $row->discount }}%</td>
                                @endif

                                @if($row->discount == null)
                                    <td>No</td>
                                @else
                                    <td>{{ number_format($row->price - $row->discount * $row->price/100) }}&#2547;</td>
                                @endif
                                <td><img width="50px" src="{{ asset($row->f_img) }}" alt="img"></td>
                                <td>{{ $row->status }}</td>
                                <td><a class="btn btn-sm btn-primary" href=""><i class="fa fa-eye"></i></a> <a
                                        class="btn btn-sm btn-danger" href=""><i class="fa fa-trash"></i></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

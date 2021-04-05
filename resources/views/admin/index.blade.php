@extends('admin.layout.master-layout')
@section('title')
    Dashboard
    @endsection

        @section('content')
            <!-- ========================================================= -->
            <div class="content-header">
                <!-- leftside content header -->
                <div class="leftside-content-header">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                    </ul>
                </div>
            </div>

    <div class="animated fadeInRight">
        <!--WIDGET BOX STYLE 1-->
        <div class="row">
            <!--BOX Style 1-->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-darker-1">
                    <a href="#">
                        <div class="panel-content">
                            <h1 class="title color-w"><i class="fa fa-globe"></i> Views </h1>
                            <h4 class="subtitle color-lighter-1">154.609</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!--BOX Style 1-->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                    <a href="#">
                        <div class="panel-content">
                            <h1 class="title color-light-1"> <i class="fa fa-envelope"></i> 124 </h1>
                            <h4 class="subtitle">New Messages</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!--BOX Style 1-->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                    <a href="#">
                        <div class="panel-content">
                            <h1 class="title color-darker-2"> <i class="fa fa-user"></i> 105 </h1>
                            <h4 class="subtitle color-darker-1">New Users</h4>
                        </div>
                    </a>
                </div>
            </div>
            <!--BOX Style 1-->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-light color-darker-2">
                    <a href="#">
                        <div class="panel-content">
                            <h1 class="title"> Total </h1>
                            <h4 class="subtitle">$14.550,00</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
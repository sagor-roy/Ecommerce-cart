@extends('layouts.master')

@section('content')

    <section>
        <div class="login mt-4">
            <div class="container">
               <div class="row">
                   <div class="col-lg-6 col-md-8 mx-auto">
                       <div class="card">
                           <div class="card-body">
                               <h4>Profile</h4>
                               <hr>
                               <div class="profile">
                                   <table class="table table-bordered table-striped">
                                       <tbody>
                                       <tr>
                                           <th>Name</th>
                                           <td>{{ $customerInfo->name }}</td>
                                       </tr>
                                       <tr>
                                           <th>Email</th>
                                           <td>{{ $customerInfo->email }}</td>
                                       </tr>
                                       <tr>
                                           <th>Number</th>
                                           <td>+880{{ $customerInfo->number }}</td>
                                       </tr>

                                       </tbody>
                                   </table>
                               </div>
                               <div class="order">
                                   <table class="table table-bordered table-striped text-center">
                                       <thead class="thead-dark">
                                       <tr>
                                           <th>No</th>
                                           <th>Order Id</th>
                                           <th>Total</th>
                                           <th>Date</th>
                                           <th>Action</th>
                                       </tr>
                                       </thead>
                                   </table>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </section>


@endsection


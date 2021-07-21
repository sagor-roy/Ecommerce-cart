@extends('layouts.master')

@section('content')

<section>
    <div class="wrapper mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="latest my-4">
                        <div class="card">
                            <div class="card-body">
                                <h5>Latest Product</h5>
                                <hr>
                                <div id="carousel-name" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <div class="row">
                                            @foreach($before as $row)
                                                <div class="col-sm-6 col-md-12 col-lg-12 mt-3">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="img">
                                                                @if($row->discount == null)
                                                                @else
                                                                <div style="padding: 2px" class="position-absolute bg-danger text-white">
                                                                {{ $row->discount }}%</div>
                                                                @endif
                                                                <img class="d-block card-img-top" src="{{ asset($row->f_img) }}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="content">
                                                                <div><a href="{{ route('product.detail',$row->slug) }}">{{ $row->name }}</a></div>
                                                                <?php
                                                    $reviews = \App\Models\Reviews::where('product_id',$row->id)->get();
                                                    $total = \App\Models\Reviews::all()->where('product_id',$row->id)->sum(function ($t){
                                                        return $t->rating;
                                                    });
                                                    if (count($reviews) < 1){
                                                        $result = 1;
                                                    }else{
                                                        $result = count($reviews);
                                                    }
                                                    $gtotal = $total/$result;
                                                    ?>
                                                    <div style="font-size: 10px;" class="star">
                                                        <i class="fa fa-star
                                                @if($gtotal >= 1 || $gtotal >= 2 || $gtotal >= 3 || $gtotal >= 4 ||                                                        $gtotal>= 5)
                                                            text-warning
                                                @endif
                                                            "></i>
                                                        <i class="fa fa-star
                                                @if($gtotal >= 2 || $gtotal >= 3 || $gtotal >= 4 || $gtotal>= 5)
                                                            text-warning
                                                @endif
                                                            "></i>
                                                        <i class="fa fa-star
                                                @if($gtotal >= 3 || $gtotal >= 4 || $gtotal>= 5)
                                                            text-warning
                                                @endif
                                                            "></i>
                                                        <i class="fa fa-star
                                                @if($gtotal >= 4 || $gtotal >= 5)
                                                            text-warning
                                                @endif
                                                            "></i>
                                                        <i class="fa fa-star
                                                @if($gtotal >= 5)
                                                            text-warning
                                                @endif
                                                            "></i>
                                                    </div>

                                                    <div class="price">
                                                        @if($row->discount == null)
                                                        <h6 class="font-weight-bold">{{ number_format($row->price) }}&#2547;</h6>
                                                    @else
                                                        <h6 class="font-weight-bold" >{{ number_format($row->price - $row->discount * $row->price/100) }}&#2547;<span class="discount">{{ number_format($row->price) }}&#2547;</span></h6>
                                                    @endif
                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="row">
                                                @foreach($after as $row)
                                                <div class="col-sm-6 col-md-12 col-lg-12 mt-3">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="img">
                                                                @if($row->discount == null)
                                                                @else
                                                                <div style="padding: 2px" class="position-absolute bg-danger text-white">
                                                                {{ $row->discount }}%</div>
                                                                @endif
                                                                <img class="d-block card-img-top" src="{{ asset($row->f_img) }}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="content">
                                                                <div><a href="{{ route('product.detail',$row->slug) }}">{{ $row->name }}</a></div>
                                                                <?php
                                                    $reviews = \App\Models\Reviews::where('product_id',$row->id)->get();
                                                    $total = \App\Models\Reviews::all()->where('product_id',$row->id)->sum(function ($t){
                                                        return $t->rating;
                                                    });
                                                    if (count($reviews) < 1){
                                                        $result = 1;
                                                    }else{
                                                        $result = count($reviews);
                                                    }
                                                    $gtotal = $total/$result;
                                                    ?>
                                                    <div style="font-size: 10px;" class="star">
                                                        <i class="fa fa-star
                                                @if($gtotal >= 1 || $gtotal >= 2 || $gtotal >= 3 || $gtotal >= 4 ||                                                        $gtotal>= 5)
                                                            text-warning
                                                @endif
                                                            "></i>
                                                        <i class="fa fa-star
                                                @if($gtotal >= 2 || $gtotal >= 3 || $gtotal >= 4 || $gtotal>= 5)
                                                            text-warning
                                                @endif
                                                            "></i>
                                                        <i class="fa fa-star
                                                @if($gtotal >= 3 || $gtotal >= 4 || $gtotal>= 5)
                                                            text-warning
                                                @endif
                                                            "></i>
                                                        <i class="fa fa-star
                                                @if($gtotal >= 4 || $gtotal >= 5)
                                                            text-warning
                                                @endif
                                                            "></i>
                                                        <i class="fa fa-star
                                                @if($gtotal >= 5)
                                                            text-warning
                                                @endif
                                                            "></i>
                                                    </div>

                                                    <div class="price">
                                                        @if($row->discount == null)
                                                        <h6 class="font-weight-bold">{{ number_format($row->price) }}&#2547;</h6>
                                                    @else
                                                        <h6 class="font-weight-bold" >{{ number_format($row->price - $row->discount * $row->price/100) }}&#2547;<span class="discount">{{ number_format($row->price) }}&#2547;</span></h6>
                                                    @endif
                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 mt-4">
                    <div class="card mb-4">
                        <div class="card-body pb-0">
                            <div class="row">
                                @foreach($product as $row)
                                <div class="col-md-4 col-lg-3 col-sm-4 col-xm-6">
                                    <div class="card hover mb-4">
                                        @if($row->stock > 0)
                                        @else
                                            <img width="100px" class="position-absolute" src="{{ asset('asset/sold.png') }}" alt="">
                                        @endif
                                        @if($row->discount == null)
                                        @else
                                        <div class="product_discount position-absolute bg-warning">
                                            {{ $row->discount }}%
                                        </div>
                                        @endif
                                        <div class="shopping position-absolute">
                                            @if(session('customer'))
                                            <h6 class="d-inline-flex">
                                                <form action="">
                                                    <button class="btn-primary f_btn "><i class="fa fa-heart"></i></button>
                                                </form>

                                                @if($row->stock > 0)
                                                    <button onclick="submitBtn({{ $row->id }})" class="btn-warning s_btn"><i class="fa fa-shopping-cart"></i></button>
                                                @else
                                                    <a onclick="alert('Product no available')" class="btn-warning s_btn"><i class="fa fa-shopping-cart"></i></a>
                                                @endif
                                            </h6>
                                            @else
                                            <h6 class="d-inline-flex">
                                                    <a onclick="alert('Please login first')" class="btn-primary f_btn "><i class="fa fa-heart"></i></a>
                                                    <a onclick="alert('Please login first')" class="btn-warning s_btn"><i class="fa fa-shopping-cart"></i></a>
                                            </h6>
                                            @endif
                                        </div>
                                        <img src="{{ asset($row->f_img) }}" class="card-img-top d-block" alt="...">
                                        <div style="padding:10px 10px;" class="card-body">
                                            <a href="{{ route('product.detail',$row->slug) }}">{{ $row->name }}</a>

                                            <?php
                                            $reviews = \App\Models\Reviews::where('product_id',$row->id)->get();
                                            $total = \App\Models\Reviews::all()->where('product_id',$row->id)->sum(function ($t){
                                                return $t->rating;
                                            });
                                            if (count($reviews) < 1){
                                                $result = 1;
                                            }else{
                                                $result = count($reviews);
                                            }
                                            $gtotal = $total/$result;
                                            ?>

                                            <div style="font-size: 10px;" class="star">
                                                <i class="fa fa-star
                                                @if($gtotal >= 1 || $gtotal >= 2 || $gtotal >= 3 || $gtotal >= 4 ||                                                        $gtotal>= 5)
                                                    text-warning
@endif
                                                    "></i>
                                                <i class="fa fa-star
                                                @if($gtotal >= 2 || $gtotal >= 3 || $gtotal >= 4 || $gtotal>= 5)
                                                    text-warning
@endif
                                                    "></i>
                                                <i class="fa fa-star
                                                @if($gtotal >= 3 || $gtotal >= 4 || $gtotal>= 5)
                                                    text-warning
@endif
                                                    "></i>
                                                <i class="fa fa-star
                                                @if($gtotal >= 4 || $gtotal >= 5)
                                                    text-warning
@endif
                                                    "></i>
                                                <i class="fa fa-star
                                                @if($gtotal >= 5)
                                                    text-warning
@endif
                                                    "></i>
                                            </div>
                                            @if($row->discount == null)
                                                <h6 class="font-weight-bold">{{ number_format($row->price) }}&#2547;</h6>
                                            @else
                                            <h6 class="font-weight-bold" >{{ number_format($row->price - $row->discount * $row->price/100) }}&#2547;<span class="discount">{{ number_format($row->price) }}&#2547;</span></h6>
                                            @endif
{{--                                            <a href="{{ route('product.detail',$row->slug) }}" class="card-link stretched-link"></a>--}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            {{ $product->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@extends('layouts.master')
@section('content')
    @if(session('type'))
        <div class="alert alert-danger">{{ session('type') }}</div>
    @endif
    <section>
        <div class="wrapper mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 right-product-banner">
                        <div class="card mt-4">
                            <img src="{{ asset('asset/img/LHS-banner.jpg') }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card mt-4">
                            <img src="{{ asset('asset/img/banner-side.png') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    @foreach($detail as $row)
                    <div class="col-lg-9 col-md-9">
                        <div class="card my-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="card">
                                            <div class="show" href="1.jpg">
                                                @if($row->discount == null)
                                                @else
                                                    <div class="product_discount position-absolute bg-warning">
                                                        {{ $row->discount }}%
                                                    </div>
                                                @endif
                                                @if($row->stock > 0)
                                                @else
                                                <img width="150px" class="position-absolute" src="{{ asset('asset/sold.png') }}" alt="">
                                                @endif
                                                <img class="card-img-top" src="{{ asset($row->f_img) }}" id="show-img">
                                            </div>
                                            <div class="product_slider">
                                            </div>
                                        </div>
                                        <div class="small-img">
                                            <div class="small-container">
                                                <div id="small-img-roll">
                                                    <img src="{{ asset($row->f_img) }}" class="show-small-img" alt="">
                                                    <img src="{{ asset($row->s_img) }}" class="show-small-img" alt="">
                                                    <img src="{{ asset($row->t_img) }}" class="show-small-img" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <h3 class="font-weight-bolder">{{ $row->name }}</h3>
                                        <div class="star">
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
                                            <span>({{ count($reviews) }} reviews)</span>
                                        </div>

                                        <div class="like_btn">
                                            <?php
                                            $like = \App\Models\Like::where('user_id', session('customer'))->where('product_id',$row->id)->get();
                                            $countLike = \App\Models\Like::where('product_id',$row->id)->get();
                                            ?>
                                            @if(session('customer'))
                                            @if(count($like) > 0)
                                            <button style="cursor: pointer;" class="btn text-danger btn-default" disabled><i class="fa fa-heart"></i></button><span class="text-danger">({{ count($countLike) }} liked)</span>
                                            @else
                                            <form action="{{ route('like') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="like" value="1">
                                                <input type="hidden" name="id" value="{{ $row->id }}">
                                                <button class="btn text-primary btn-default" type="submit"><i class="fa fa-thumbs-up"></i></button><span class="text-danger">({{ count($countLike) }} like)</span>
                                            </form>
                                            @endif
                                                @else
                                                <a class="btn text-primary btn-default" onclick="alert('Please Login first')"><i class="fa fa-thumbs-up"></i></a><span class="text-danger">({{ count($countLike) }} like)</span>
                                            @endif
                                        </div>

                                        <p>Availity : <span class="text-danger">
                                                @if($row->stock > 0)
                                                    In-Stock
                                                @else
                                                    Sold-Out
                                                @endif
                                            </span></p>
                                        <p>Code : {{ $row->code }}</p>
                                        <p class="text-justify">{{ substr($row->desc,0,300).'.....' }}</p>
                                        <hr>
                                        @if($row->discount == null)
                                            <h4 class="text-danger font-weight-bolder">{{ number_format($row->price) }}&#2547;</h4>
                                        @else
                                        <h4 class="text-danger font-weight-bolder">{{ number_format($row->price - $row->discount * $row->price/100) }}&#2547;<span class="discount">{{ number_format($row->price) }}&#2547;</span></h4>
                                        @endif
                                        <hr>
                                        <div class="">
                                            <form action="" method="post" class="btn-submit">
                                                <div class="form-inline">
                                                    <input type="hidden" name="product_id" value="{{ $row->id }}">
                                                    <input type="number" name="qty" class="custom_field custom_fields" value="1">
                                                    @if(session('customer'))
                                                    <button
                                                        @if($row->stock > 0)
                                                            @else
                                                        disabled
                                                            @endif
                                                        class="custom_btn btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to Card</button>
                                                    @else
                                                        <a onclick="alert('Please Login First')" class="custom_btn btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to Card</a>
                                                    @endif
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment mt-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="rating">
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
                                            <h5 class="text-warning font-weight-bold">({{ round($gtotal,1) }}/5)</h5>
                                            <h5>Reviews : <span class="text-warning reviews">({{ count($reviews) }} review)</span></h5>
                                            <hr>
                                            @foreach($reviews as $rows)
                                            <div class="comment-display">
                                                <img width="25px" src="{{ asset('asset/img/user.png') }}" alt="img">
                                                <div class="contents d-inline-flex">
                                                    <h6 class="font-weight-bold mr-1">{{ $rows->customer->name }}</h6>
                                                    (<div class="rating">
                                                        <i class="fa fa-star
                                                            @if($rows->rating == 1 || $rows->rating == 2 ||                                                                        $rows->rating == 3 || $rows->rating == 4 ||                                                                           $rows->rating == 5)
                                                            text-warning
                                                            @endif
                                                            "></i>
                                                        <i class="fa fa-star
                                                            @if($rows->rating == 2 || $rows->rating == 3 ||                                                                       $rows->rating == 4 || $rows->rating == 5)
                                                            text-warning
                                                            @endif
                                                            "></i>
                                                        <i class="fa fa-star
                                                            @if($rows->rating == 3 || $rows->rating == 4 ||                                                                       $rows->rating == 5)
                                                            text-warning
                                                            @endif
                                                            "></i>
                                                        <i class="fa fa-star
                                                            @if($rows->rating == 4 || $rows->rating == 5)
                                                            text-warning
                                                            @endif
                                                            "></i>
                                                        <i class="fa fa-star
                                                            @if($rows->rating == 5)
                                                            text-warning
                                                            @endif
                                                            "></i>
                                                    </div>)
                                                </div>
                                                <div class="texts">
                                                    <span>{{ $rows->comment }}</span>
                                                    <hr>
                                                </div>
                                            </div>
                                            @endforeach

                                            @if(session('customer'))
                                            <form action="{{ route('reviews') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $row->id }}">
                                                <div class="rate">
                                                    <input type="radio" id="star5" name="rate" value="5" />
                                                    <label for="star5" title="text">5 stars</label>
                                                    <input type="radio" id="star4" name="rate" value="4" />
                                                    <label for="star4" title="text">4 stars</label>
                                                    <input type="radio" id="star3" name="rate" value="3" />
                                                    <label for="star3" title="text">3 stars</label>
                                                    <input type="radio" id="star2" name="rate" value="2" />
                                                    <label for="star2" title="text">2 stars</label>
                                                    <input type="radio" id="star1" name="rate" value="1" />
                                                    <label for="star1" title="text">1 star</label>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <input type="text" name="comment" placeholder="Comment here" class="custom_field">
                                                </div>
                                                <button class="custom_btn ml-0 btn btn-primary" type="submit">Comment</button>
                                            </form>
                                            @else
                                                <div class="rate">
                                                    <input type="radio" id="star5" name="rate" value="5" />
                                                    <label for="star5" title="text">5 stars</label>
                                                    <input type="radio" id="star4" name="rate" value="4" />
                                                    <label for="star4" title="text">4 stars</label>
                                                    <input type="radio" id="star3" name="rate" value="3" />
                                                    <label for="star3" title="text">3 stars</label>
                                                    <input type="radio" id="star2" name="rate" value="2" />
                                                    <label for="star2" title="text">2 stars</label>
                                                    <input type="radio" id="star1" name="rate" value="1" />
                                                    <label for="star1" title="text">1 star</label>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <input type="text" name="comment" placeholder="Comment here" class="custom_field">
                                                </div>
                                                <a onclick="alert('Please Login First')" class="custom_btn ml-0 btn btn-primary" type="submit">Comment</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

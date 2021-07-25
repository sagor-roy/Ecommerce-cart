@if (!$data->isEmpty())
    <div class="row">
        @foreach ($data as $row)
        <div class="col-md-4 col-lg-2 col-6">
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
                    <h6 class="d-inline-flex">
                        <form action="">
                            <button class="btn-primary f_btn "><i class="fa fa-heart"></i></button>
                        </form>
                            <button onclick="submitBtn({{ $row->id }})" class="btn-warning s_btn"><i class="fa fa-shopping-cart"></i></button>

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
                </div>
            </div>
        </div>
        @php($last_id = $row->id)
        @endforeach
    </div>

    <div class="load_more">
        <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="{{ $last_id }}" id="load_more_button">Load More</button>
    </div>
    @else
    <h2>no data</h2>
@endif


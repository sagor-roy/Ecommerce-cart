

<!-- Option 2: Separate Popper and Bootstrap JS -->
<script src="{{ asset('asset/js/jquery-3.5.1.slim.min.js') }}"></script>
<script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('asset/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('asset/js/main.js') }}"></script>
<script src="{{ asset('asset/js/sweetalert2.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
// CSRF TOKEN
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
// CSRF TOKEN END

// SHOPPING CARD TOTAL AMOUNT SHOW
    function allData(){
        function numberFormat(x){
                    x = x.toString();
                    var patter = /(-?\d+)(\d{3})/;
                    while (patter.test(x))
                    x = x.replace(patter,"$1,$2");
                    return x;
                }
        $.ajax({
            type:"GET",
            dataType:'json',
            url:"/cartShow",
            success:function(response){
                $('#taka').html(numberFormat(response.total)+" &#2547;");
                $('#shopping').html(response.qty);
            }
        })
    }
    allData();
// SHOPPING CARD END


function cartItem() {
    $.ajax({
            type:"GET",
            dataType:'json',
            url:"/carts/items",
            success:function(response){

            if(response.view == "") {
                $("#empty").html("<h4 class='d-flex justify-content-center align-items-center'>( Empty )</h4>")
            } else {
                $("#empty").html("<h4 class='d-none'></h4>")
                function numberFormat(x){
                x = x.toString();
                var patter = /(-?\d+)(\d{3})/;
                while (patter.test(x))
                x = x.replace(patter,"$1,$2");
                return x;
                }
                var title = ""
                title = title + "<div class='d-flex justify-content-between border-bottom mb-1'>"
                title = title + "<p class='m-0 text-muted'>Items ("+response.qty+")</p>"
                title = title + "<a href='{{ url("/cart") }}'>View Cart</a>"
                title = title + "</div>"
                $("#title").html(title)
            var data = ""
            $.each(response.view, function(key, value) {
                if(value.discount == null) {
                    var price = value.price
                } else {
                    var price = value.price - value.discount * value.price /100;
                }
                data = data + "<div class='d-flex justify-content-between my-2'>"
                data = data + "<div class='text-left'>"
                data = data + "<h6 class='m-0'>"+value.name+"</h6>"
                data = data + "<p class='m-0 text-muted'> 1 x &#2547;"+numberFormat(Math.trunc(price))+"</p>"
                data = data + "</div>"
                data = data + "<div>"
                data = data + "<img width='50' src='"+value.f_img+"' alt='img' />"
                data = data + "<button onclick='deleteBtn("+value.id+")' class='text-white rounded-circle position-absolute border-0 bg-danger'><i class='fas fa-trash fa-sm'></i></button>"
                data = data + "</div>"
                data = data + "</div>"
            })
            $("#product-list").html(data);

            var total = ""
            total = total + "<div class='border-top d-flex justify-content-between mb-3 pt-2'>"
            total = total + "<h6 class='m-0 font-weight-bold'>Total :</h6>"
            total = total + "<h6 class='m-0 font-weight-bold'>&#2547;"+numberFormat(Math.trunc(response.grandtotal))+"</h6>"
            total = total + "</div>"
            total = total + "<a class='btn btn-primary d-block btn-sm' href='{{ url("/checkout") }}'>CHECKOUT</a>"
            $("#g-total").html(total);
            }
            }
        })
}
cartItem();

function deleteBtn(id){
    $.ajax({
        url:"cart/item/delete/"+id+"",
        method:'get',
        success:function(response) {
        }
    });
}

deleteBtn();


// DETAIL PAGE ADD TO CARD
    $(".btn-submit").click(function(e){
        e.preventDefault();
        var id = $("input[name=product_id]").val();
        var qty = $("input[name=qty]").val();
        var url = '{{ url('add') }}';

        $.ajax({
            url:url,
            method:'POST',
            data:{
                id:id,
                qty:qty
            },
            success:function(response){
                allData();
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Product added'
                })
            },
            error:function(error){
                console.log(error)
            }
        });
    });
// DETAIL PAGE ADD TO CARD END

// FORNTEND ADD TO CARD (INDEX)
    function submitBtn(id){
        var url = '{{ url('cart') }}';
        document.getElementById("loader").classList.remove('d-none');
        $.ajax({
            url:url,
            method:'POST',
            data:{
                product_id:id
            },
            success:function(response){
                document.getElementById("loader").classList.add('d-none');
                cartItem();
                allData();
                deleteBtn();
                if(response.faild) {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'warning',
                    title: 'Please Login First'
                })
                } else {
                  if (response.sorry) {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: 'Sorry !! Product Stockout'
                })
                  } else {
                    if(response.success) {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Product added'
                })
                }else {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: 'Product already add to cart'
                })
                }
                  }
                }
            },
            error:function(error){
                console.log(error)
            }
        });
    }
// END

function commentList(){
    var id = $("input[name=product_id]").val();
    $.ajax({
        url:"/comment/list/"+id+"",
        dataType:'json',
        method:'get',
        success:function (response) {
            var data = ""
            $.each(response.review,function (key,value){

                if(value.rating == 1 || value.rating == 2 || value.rating == 3 || value.rating == 4 || value.rating ==5) {
                    var star1 = "text-warning";
                }
                if(value.rating == 2 || value.rating == 3 || value.rating == 4 || value.rating ==5) {
                    var star2 = "text-warning";
                }
                if(value.rating == 3 || value.rating == 4 || value.rating ==5) {
                    var star3 = "text-warning";
                }
                if(value.rating == 4 || value.rating == 5) {
                    var star4 = "text-warning";
                }
                if(value.rating == 5) {
                    var star5 = "text-warning";
                }

                data = data + "<div class='comment-display py-2'>"
                data = data + "<img width='25px' src='{{ asset("asset/img/user.png") }}' alt='img'/>"
                data = data + "<div class='contents d-inline-flex'>"
                data = data + "<h6 class='font-weight-bold mr-1'>"+value.name+"</h6>"
                data = data + "(<div class='rating'>"
                data = data + "<i class='fa fa-star "+star1+"'></i>"
                data = data + "<i class='fa fa-star "+star2+"'></i>"
                data = data + "<i class='fa fa-star "+star3+"'></i>"
                data = data + "<i class='fa fa-star "+star4+"'></i>"
                data = data + "<i class='fa fa-star "+star5+"'></i>"
                data = data + "</div>)"
                data = data + "</div>"
                data = data + "<div class='texts'>"
                data = data + "<span>"+value.comment+"</span>"
                data = data + "</div>"
                data = data + "</div>"
            });

            $("#cmt-display").html(data);

            $("#rating-view").html("<h5 class='text-warning font-weight-bold'>("+response.gtotal+"/5)</h5> <h5>Reviews : <span class='text-warning reviews'>"+response.total+"</span></h5>");

            $("#re-total").html("<span>("+response.total+" reviews)</span>");

            if(response.gtotal >= 1 || response.gtotal >= 2 || response.gtotal >= 3 || response.gtotal >= 4 || response.gtotal >= 5) {
                var rate1 = "text-warning";
            }
            if(response.gtotal >= 2 || response.gtotal >= 3 || response.gtotal >= 4 || response.gtotal >= 5) {
                var rate2 = "text-warning";
            }
            if(response.gtotal >= 3 || response.gtotal >= 4 || response.gtotal >= 5) {
                var rate3 = "text-warning";
            }
            if(response.gtotal >= 4 || response.gtotal >= 5) {
                var rate4 = "text-warning";
            }
            if(response.gtotal >= 5) {
                var rate5 = "text-warning";
            }

            var data = ""
            data += "<div class='rating'>"
            data += "<i class='fa fa-star "+rate1+"'></i>"
            data += "<i class='fa fa-star "+rate2+"'></i>"
            data += "<i class='fa fa-star "+rate3+"'></i>"
            data += "<i class='fa fa-star "+rate4+"'></i>"
            data += "<i class='fa fa-star "+rate5+"'></i>"
            data += "</div>"
            $("#total-rate").html(data)
            $("#star").html(data)
        }
    });
}
commentList();

$("#commentSubmit").on('submit',function (e){
    e.preventDefault();
    var id = $("input[name=product_id]").val();
    var comment = $("input[name=comment]").val();
    var rating = $("input[name=rate]:checked").val();
    document.getElementById("loader").classList.remove('d-none');
    $.ajax({
        url:'/reviews',
        dataType:'json',
        method:'post',
        data:{
            id:id,
            comment:comment,
            rating:rating
        },
        success:function (response) {
            document.getElementById("loader").classList.add('d-none');
            commentList();
            $("input[name=comment]").val("");
            $("input[name=rate]").prop('checked',false);
        },
        error:function (response) {
            alert(response.responseJSON.errors.comment);
        }
    });
});



</script>

</body>
</html>

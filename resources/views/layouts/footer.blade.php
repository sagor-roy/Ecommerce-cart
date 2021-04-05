

<!-- Option 2: Separate Popper and Bootstrap JS -->
<script src="{{ asset('asset/js/jquery-3.5.1.slim.min.js') }}"></script>
<script src="{{ asset('asset/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('asset/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('asset/js/main.js') }}"></script>
<script src="{{ asset('asset/js/sweetalert2.js') }}"></script>

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
                    timer: 2000,
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

        $.ajax({
            url:url,
            method:'POST',
            data:{
                product_id:id
            },
            success:function(response){
                allData();
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
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
    }
// END



</script>

</body>
</html>

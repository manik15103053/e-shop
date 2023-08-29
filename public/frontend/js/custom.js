$(document).ready(function(){

    $('.addToCartBtn').click(function(e){
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $.ajax({
            method: "get", // Use POST instead of GET
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
                '_token': '{{ csrf_token() }}',
            },
            success: function(response){
                swal(response.status);
            },


        });
    });

    $('.increment-btn').click(function(e){
        e.preventDefault();

        // var inc_value = $('.qty-input').val();
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;

        if(value < 10){
            value++;
            // $('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $('.decrement-btn').click(function(e){
        e.preventDefault();

        // var dec_value = $('.qty-input').val();
        var dec_value = $(this).closest('.product_data').find('.qty-input').val();

        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;

        if(value > 1){
            value--;
            // $('.qty-input').val(value);
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $('.delete-cart-item').click(function(e){
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajax({
        method: "get",
        url: "/delete-cart-item",
        data:{
            'prod_id' : prod_id,
            '_token': '{{ csrf_token() }}',
        },
        success:function (response){
            window.location.reload();
            swal("", response.status, "success");
        }
        });
    });

    $('.changeQty').click(function(e){
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var prod_qty = $(this).closest('.product_data').find('.qty-input').val();
        data = {
            'prod_id' : prod_id,
            'prod_qty' : prod_qty,
            '_token': '{{ csrf_token() }}',
        }
        $.ajax({
            method: "get",
            url: '/update-card',
            data: data,
            success: function(response){
                window.location.reload();
                
            }
        });
    });


});

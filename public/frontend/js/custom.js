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
                if(response.success){
                    toastr.success('added to cart successfully');
                }else{
                    toastr.error('already added to cart');
                }
                loadCart()
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

    // $('.delete-cart-item').click(function(e){
        $(document).on('click', '.delete-cart-item', function(e){

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
            // window.location.reload();
            
            loadCart();
            $('.cartItems').load(location.href + " .cartItems", function(){
                updateTotal()
            });
            if(response.success){
                toastr.success('Product Deleted Successfully');
            }else{
                toastr.error('Product not found in cart');
            }


        }
        });
    });

    $('.changeQty').click(function(e){
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var prod_qty = $(this).closest('.product_data').find('.qty-input').val();
        updateTotal();
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
                if(response.success){
                    toastr.success('Quantity Updated');
                }else{
                    toastr.error('Quantity Not Updated');
                }

            }
        });
    });

   //Total Price Calculate

   function updateTotal() {
        var total = 0;
        $('.product_data').each(function () {
            var price = parseFloat($(this).find('.col-md-2 h6').data('price'));
            var quantity = parseInt($(this).find('.qty-input').val());
            total += price * quantity;
        });
        $('#total').text('Total: Rs ' + total.toFixed(2));
    }

    // Initial total calculation
    updateTotal();


    //Add To Wishlist
    $('.addToWishlist').click(function(e){
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'post',
            url: '/add-to-wishlist',
            data:{
                'product_id': product_id,
                // '_token': '{{ csrf_token() }}',
            },
            success:function(response){
                if (response.success) {
                    toastr.success(response.success);
                } else {
                    toastr.error(response.error);
                }
                loadWishlit()
            }
        });
    });

    //remove Wishlist
    // $('.removeWishlist').click(function(e){
        $(document).on('click', '.removeWishlist', function(e){

        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method:'get',
            url: '/remove-wishlist',
            data: {
                'product_id' : product_id
            },
            success:function(response){
                // window.location.reload();
                loadWishlit()
                $('.wishlists').load(location.href + ' .wishlists');
                if (response.success) {
                    toastr.success(response.success);
                } else {
                    toastr.error(response.error);
                }
            }
        });

    });

    //Cart count

    function loadCart(){
        $.ajax({
            method: 'get',
            url: '/load-cart-data',
            success:function(response){
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
            }
        });
    }

    //load wishlist
    function loadWishlit(){
        $.ajax({
            method:'get',
            url: '/load-wishlit',
            success:function(response){
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
            }
        });
    }

    loadWishlit()
    loadCart()

    //Review Product
//     $('.reviewBtn').click(function (e) {
//     e.preventDefault();

//     var prodId = $(this).data('prod-id'); // Assuming you store prod_id in a data attribute
//     var userReview = $(this).closest('.product_data').find('.user_review').val();

//     $.ajax({
//         method: "POST",
//         url: "/add-user-review",
//         data: {
//             'prod_id': prodId,
//             'user_review': userReview,
//             '_token': $('meta[name="csrf-token"]').attr('content'), // Add CSRF token
//         },
//         success: function (response) {
//             console.log(response);
//             if (response.success) {
//                 toastr.success(response.success);
//             } else {
//                 toastr.error(response.error);
//             }
//         }
//     });
// });

});

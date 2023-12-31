$(document).ready(function () {
    $('.razorpay_btn').click(function (e) { 
        e.preventDefault();

        var fname =     $('.fname').val();
        var lname =     $('.lname').val();
        var email =     $('.email').val();
        var phone =     $('.phone').val();
        var address1 =  $('.address1').val();
        var address2 =  $('.address2').val();
        var city =      $('.city').val();
        var state =     $('.state').val();
        var country =   $('.country').val();
        var pincode =   $('.pincode').val();

        if(!fname){
            fname_error = "First Name is required";
            $('#fname_error').html('');
            $("#fname_error").html(fname_error);
        }else{
            fname_error = '';
            $('#fname_error').html('');
        }

        if(!lname){
            lname_error = "last Name is required";
            $('#lname_error').html('');
            $("#lname_error").html(lname_error);
        }else{
            lname_error = '';
            $('#lname_error').html('');
        }

        if(!email){
            email_error = "The Email is required";
            $('#email_error').html('');
            $("#email_error").html(email_error);
        }else{
            email_error = '';
            $('#email_error').html('');
        }
        
        if(!phone){
            phone_error = "The Phone is required";
            $('#phone_error').html('');
            $("#phone_error").html(phone_error);
        }else{
            phone_error = '';
            $('#phone_error').html('');
        }

        if(!address1){
            address1_error = "The Address1 field is required";
            $('#address1_error').html('');
            $("#address1_error").html(address1_error);
        }else{
            address1_error = '';
            $('#address1_error').html('');
        }

        if(!address2){
            address2_error = "The Address2 field is required";
            $('#address2_error').html('');
            $("#address2_error").html(address2_error);
        }else{
            address2_error = '';
            $('#address2_error').html('');
        }

        if(!city){
            city_error = "The city field is required";
            $('#city_error').html('');
            $("#city_error").html(city_error);
        }else{
            city_error = '';
            $('#city_error').html('');
        }

        if(!state){
            state_error = "The State field is required";
            $('#state_error').html('');
            $("#state_error").html(state_error);
        }else{
            state_error = '';
            $('#state_error').html('');
        }

        if(!country){
            country_error = "The Country field is required";
            $('#country_error').html('');
            $("#country_error").html(country_error);
        }else{
            country_error = '';
            $('#country_error').html('');
        }

        if(!pincode){
            pincode_error = "The pincode field is required";
            $('#pincode_error').html('');
            $("#pincode_error").html(pincode_error);
        }else{
            pincode_error = '';
            $('#pincode_error').html('');
        }

        if(fname_error != '' || lname_error != '' || email_error != '' || phone_error != '' || address1_error != '' || address2_error != '' || city_error != '' || state_error != '' || country_error != '' || pincode_error != ''){
            return false;
        }else{

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            data = {
                'fname' :fname,
                'lname' :lname,
                'email' :email,
                'phone' :phone,
                'address1' :address1,
                'address2' :address2,
                'city' :city,
                'state' :state,
                'country' :country,
                'pincode' :pincode
            }
            $.ajax({
                method: "post",
                url: "/proceed-to-pay",
                data: data,
                success: function (response) {
                    // alert(response.total_price);

                    var options = {
                        "key": "rzp_test_OHS5drIns6unds", // Enter the Key ID generated from the Dashboard
                        "amount": response.total_price * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": response.fname+' '+response.lname, //your business name
                        "description": "Thank you for choosing us",
                        "image": "https://leadvictor.com/Contents/Images/razor_pay_icon.png",
                        // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        "handler": function (responsea){

                            $.ajax({
                                method: "post",
                                url: "/place-order",
                                data: {
                                    'fname': response.fname,
                                    'lname': response.lname,
                                    'email': response.email,
                                    'phone': response.phone,
                                    'address1': response.address1,
                                    'address2': response.address2,
                                    'city': response.city,
                                    'state': response.state,
                                    'country': response.country,
                                    'pincode': response.pincode,
                                    'payment_mode': 'Paid by Razorpay',
                                    'payment_id': responsea.razorpay_payment_id,
                                },
                                success: function (responseb) {
                                    if (responseb.success) {
                                        toastr.success(responseb.success);
                                    } else {
                                        toastr.error(responseb.error);
                                    }
                                    window.location.href = '/my-order';

                                }
                            });
                           
                        },
                        "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information, especially their phone number
                            "name": response.fname+' '+response.lname, //your customer's name
                            "email": response.email, 
                            "contact": response.phone  //Provide the customer's phone number for better conversion rates 
                        },
                        
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();

                    
                }
            });
        }
    });

    
    
});
// JavaScript Document
$(document).ready(function() {

    // validate contact form on keyup and submit
    $("#customer_form").validate({
       // errorClass:'customer_error',
        rules: {
            cus_first_name: {
                required: true
            },
            cus_address1: {
                required: true
            },
            cus_city_code: {
                required: true
            },
            cust_state_code: {
                required: true
            },
            cus_pincode: {
                required: true
            },
            cus_client_id: {
                required: true
            }
        },
        messages: {
            cus_first_name: {
                required: "Please enter the customer name"
            },
            cus_address1: {
                required: "Please enter the address...!"
            },
            cus_city_code: {
                required: "Please enter the city code...!"
            },
            cust_state_code: {
                required: "Please enter the state code ...!"
            },
            cus_pincode: {
                required: "Please enter the pincode ...!"
            },
            cus_client_id: {
                required: "Please enter the client number"
            }
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.next());

        }

    });
});
// JavaScript Document
$(document).ready(function() {

    // validate contact form on keyup and submit
    $("#courier_form").validate({
        // errorClass:'customer_error',
        rules: {
            cou_ser_name: {
                required: true
            },
            cou_ser_address: {
                required: true
            },
//            cou_ser_phone_no: {
//                required: true
//            }
        },
        messages: {
            cou_ser_name: {
                required: "Please enter the customer name"
            },
            cou_ser_address: {
                required: "Please enter the address...!"
            }
//            cou_ser_phone_no: {
//                required: "Please enter the city code...!"
//            }
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.next());

        }

    });
});
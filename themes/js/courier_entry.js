// JavaScript Document

$(document).ready(function() {

    //customer autocomplete code
    $('#search_text').autocomplete({
        minLength: 1,
        source: function(request, response) {
            $.getJSON(baseurl + "admin/selected_customer", {
                search_string: request.term
            }, response);
        },
        focus: function(event, ui) {
            $("#search_text").val(ui.item.cus_client_id);
            return false;
        },
        select: function(event, ui) {
            $("#search_text").val(ui.item.cus_first_name);
            $("#cou_ent_client_id").val(ui.item.cus_id);
            
            $("#customer_details").val(ui.item.cus_client_id + '\n' + ui.item.cus_first_name);
            return false;
        }
    })
            .data("ui-autocomplete")._renderItem = function(ul, item) {
        return $("<li>")
                .append("<a> <b>" + item.cus_client_id + " </b>/ " + item.cus_first_name + "</a>")
                .appendTo(ul);
    };




    // validate contact form on keyup and submit
    $("#courier_entry_form").validate({
        // errorClass:'customer_error',
        rules: {
            cou_ser_name: {
                required: true
            },
            cou_ser_address: {
                required: true
            },
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
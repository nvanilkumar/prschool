// JavaScript Document
$(function() {
    //Apply the validations to the form
    $('#class_form').validate({
         rules: {
            class_name: {
                required: true
            },
            "section_list[]": {
                required: true
            },
            "subject_list[]": {
                required: true
            }
        },
        messages: {
            class_name: {
                required: "Please enter the class name"
            },
            "section_list[]": {
                required: "Please select the section...!"
            },
            "subject_list[]": {
                required: "Please select the subject...!"
            }

        },
        errorPlacement: function(error, element) {
            error.appendTo(element.next());

        }
        
    });
    

    //set the main class id
    $("#class_id").click(function() {
        $("#sc_cls_main_class").val($(this).val());
    });

    //set the main class name to hidden varibal
    $("#class_form").submit(function() {
        var class_name = "";
        class_name = ($("#section_div").is(':visible')) ?
                $("#section_name").val() : $("#class_name").val();

        $("#sc_cls_name").val(class_name);
    });
});


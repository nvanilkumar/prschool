// JavaScript Document
$(function() {

    var class_rules, section_rules;

    class_rules = {
        class_name: {
            required: true,
            messages: {
                required: "Please enter the class name"
            }
        }
    };

    section_rules = {
        class_id: {
            required: true,
            messages: {
                required: "Please select the class name"
            }
        },
        section_name: {
            required: true,
            messages: {
                required: "Please enter the section name"
            }
        }

    };

    //Hide the section details div initially
    $('#section_div').hide();

    //add click event to radio buttons
    $('#class_details').on('click', ':radio', function() {
        var event_value;
        event_value = $(this).val();
       
        
    });
    //Apply the validations to the form
    $('#class_form').validate({
    });
    show_class_section_div(url_type, section_rules,class_rules);

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

//To Show the class related fields (or) section related fields
function show_class_section_div(event_value, section_rules,class_rules){
    if (event_value === "class")
        {
            $('#class_div').show();
            $('#section_div').hide();

           // removeRules(section_rules);
            addRules(class_rules);

        } else if (event_value === "section") {
            $('#class_div').hide();
            $('#section_div').show();

           // removeRules(class_rules);
            addRules(section_rules);

        }
}

 

//Add rules to validator
function addRules(rulesObj) {
    for (var item in rulesObj) {

        $('#' + item).rules('add', rulesObj[item]);

    }
}
//remove rules from validator
function removeRules(rulesObj) {
    for (var item in rulesObj) {
        $('#' + item).rules('remove');
    }
}
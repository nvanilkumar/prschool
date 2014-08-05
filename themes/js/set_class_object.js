
$(function() {
    var check_box;

    //On click on section & class data
    $('#class_id, #section_list').click(function() {
        var class_id = $(this).val();
        var objects_list;
        $("#class_value").val(class_id);

        //Set the check box status
        var page_type = $("#page_type").val();
        if (page_type !== 'exams')
        {
            objects_list = get_db_class_objects(class_id, page_type);
            set_checkbox_values(objects_list);
        }

        //Exam page type
        if (page_type === 'exams')
        {
            //Bring the all subject list
            objects_list = get_db_class_objects(class_id, "class_subjects");
            //populate subjects to div
            populate_subjects(objects_list);
            
            //Attendance add
            $("#class_exam_subject").click(function() {
                assign_class_exam();
            });
        }



    });

    //on change of checkbox
    $(".subject_ids").on("click", function() {
        var type, object_id, post_data, post_url, option_type;
        var class_value = $("#class_value").val();
        check_box = ($(this).attr('checked') === "checked") ? false : true;
        if (class_value === "0")
        {
            $(this).prop('checked', check_box);
            alert("Please select the class");
        } else {
            type = $("#page_type").val();
            object_id = $(this).val();
            option_type = (!check_box) ? 1 : 0;
            post_url = baseurl + 'remote/set_object_class',
                    post_data = {type: type, option_type: option_type,
                        class_id: class_value, object_id: object_id};
            $.ajax({
                url: post_url,
                type: "POST",
                data: post_data,
                async: false,
                success: function(responseText) {
                    //effected rows zero & request type is delete
                    if ((responseText == 0) && (option_type == 0))
                    {
                        alert("Please change the fisical year");
                        $(this).prop('checked', check_box);
                    } else {
                        alert("Sucessfully assign the value");
                    }
                    //console.log(responseText);

                }

            });

        }

    });


});

//To validate & submit the data
function assign_class_exam(){
    var status,  post_url, post_data={};
     status = $("#subjects_form").valid();
     post_url = 'remote/set_object_class';
     if (status) {
            
        post_data.exam_id = $("#exam_list").val();
        post_data.class_id =$("#class_value").val();
       //option_type = (!check_box) ? 1 : 0;
        post_data.option_type=1;//1 for update
        post_data.type="exams";
        post_data.subjects=$("#subjects_form").serialize();
        ajax_send_data(post_url, post_data);
       // $('#subjects_form')[0].reset();

    } else {
        alert("Please enter valid data ...");
    }
}

//send the data to requested url
function ajax_send_data(url, data) {
    var post_url = baseurl + url,
            result = "";

    $.ajax({
        url: post_url,
        type: "POST",
        data: data,
        async: false,
        dataType: 'json',
        success: function(responseText) {
            //result = responseText;
            console.log(responseText);
            alert("done");
        }

    });

    //return result;
}
//populate objects to div
function populate_subjects(objects_list) {
    var div_ele = $("#subjects_div"),
            subject,
            input_ele = '';
//markup div element
    var $markup_div = $('<div class="form-group" >' +
            '<label class="col-md-3 control-label ui-sortable name"></label>' +
            '<div class="col-md-9 ui-sortable">' +
            '<input type="text" class="form-control required" placeholder="max marks"\n\
                          value=""><br/>' +
            '</div>' +
            '</div><br/>');

    var count = (objects_list !== null) ? objects_list.length : 0;
    div_ele.empty();
    for (var i = 0; i < count; i++) {
        $('.name', $markup_div).text(objects_list[i].sc_sub_name);
        $('.form-control', $markup_div).attr("name", objects_list[i].sc_sub_name);
        div_ele.append($markup_div[0].outerHTML);

    }
}
//Sets the check box values related to db data
function set_checkbox_values(list) {
    var check_box;

    //clear the check box values
    $('#data-table').find('.subject_ids:checked').removeAttr('checked');

    //  sc_subject_id

    $('.subject_ids').each(function() {
        check_box = $(this);

        $.each(list, function(index, value) {
            if (check_box.val() === value.sc_subject_id)
                check_box.prop('checked', true);

        });


    });

}
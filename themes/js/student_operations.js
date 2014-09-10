/*
*@Author : Anil Kumar M
*@Date : 9-8-2014 
* 
* Student information, Marks, Remarks, Payments add related function
*/
 $(function() {

        //Payment div set datepicker plugin
        $('#sc_pay_date').datepicker({
                    format: "yyyy-mm-dd"
         });  

        //decorate the student list box
        //decorate_student();


        //On click on section & class data
        $('#class_id, #section_list').click(function() {
            var class_id = $(this).val();
            $("#class_value").val(class_id);
            
            //hide student info div
            $("#student_information_div").hide();

            student_list_array = get_student_list(class_id);
            markup_student_select_box("student_list", student_list_array);
            
            //check marks tab is enable or not
            var marks_tab_status=$("#marks-tab").parent().attr("class");
            if(marks_tab_status === "active"){
               student_subjects_markup(); 
            }

        });

        //On change of student id
        $("#student_list").click(function() {
            var student_id = $(this).val(),
                    student_details = '';
            student_details = get_student_detail(student_id);
            enable_student_info_tab(student_details);
            
            if(student_id > 0)
            $("#student_information_div").show();

        });

        //Attendance add
        $("#att_button").click(function() {
            add_attendance();
        });

        //Add remarks
        $("#remarks_button").click(function() {
            add_remarks();
        });
        //Add Payments
        $("#payment_button").click(function(){
            add_studnet_payment();
        });
        
        //Marks tab click to populate the subjects list
        //$("#feed").click(function(){
             student_subjects_markup();
            var objects_list ="";
            objects_list = get_db_class_objects($("#class_value").val(),"class_exams");
            markup_exams_list_box("exams_list",objects_list);
            
        //});
        
        
        $("#class_exam_subject").click(function(){
            insert_student_marks_details();
            
        });
    });
    
    //Insert Student Marks details
    function insert_student_marks_details(){
         var url = 'remote/add_marks',
                data = {},
                status;
         status = $("#subjects_form").valid();
        
        if (status) {
            data.class_id = $("#class_value").val();
            data.student_id = $("#student_list").val();
            //data.exam_id = $("#exams_list").val();
            //data.subjects=$("#subjects_form").serialize();
            data.subjects=$("#subjects_form").serializeArray(); 
            ajax_send_data(url, data);

          $('#default-tab-5-form')[0].reset();
        } else {
            alert("Please enter valid data ...");
        }
        
    }
    
    //To Markup the subjects div with server data
    function student_subjects_markup(){
        
        var class_id =  $("#class_value").val();  
        //Bring the all subject list
        subjects_list = get_db_class_objects(class_id, "class_subjects");
 
        
        
            var div_ele = $("#subjects_div") ;
//markup div element
    var $markup_div = $('<div class="form-group" >' +
            '<label class="col-md-3 control-label ui-sortable name"></label>' +
            '<div class="col-md-9 ui-sortable">' +
            '<input type="text" class="form-control required" placeholder="max marks"\n\
                          value=""><br/>' +
            '</div>' +
            '</div><br/>');

        var count = (subjects_list !== null) ? subjects_list.length : 0;
        div_ele.empty();
        for (var i = 0; i < count; i++) {
            $('.name', $markup_div).text(subjects_list[i].sc_sub_name);
            $('.form-control', $markup_div).attr("name", subjects_list[i].sc_sub_name);
            div_ele.append($markup_div[0].outerHTML);

        }
        
    }
    
    
    //Add Student payments
    function add_studnet_payment(){
        var url = 'remote/student_pay_entry',
                data = {},
                status;
         status = $("#default-tab-5-form").valid();
        
        if (status) {
            data.sc_pay_student_id = $("#student_list").val();
            data.sc_pay_description = $("#sc_pay_description").val();
            data.sc_pay_mode = $("#sc_pay_mode").val();
            data.sc_pay_name = $("#sc_pay_name").val();
            data.sc_pay_date = $("#sc_pay_date").val();
            data.sc_pay_amount = $("#sc_pay_amount").val();
            ajax_send_data(url, data);

          $('#default-tab-5-form')[0].reset();
        } else {
            alert("Please enter valid data ...");
        }
        
    }

    //Add Attendance
    function add_attendance() {

        var url = 'remote/add_attendance',
                data = {},
                month_id = '',
                st_days = '',
                status;

        status = $("#default-tab-2-form").valid();
        month_id = $("#month_list").val();
        st_days = $("#st_working_days").val();
        if (status) {
            data.month_id = month_id;
            data.attended_days = st_days;
            data.student_id = $("#student_list").val();
            ajax_send_data(url, data);

            $("#month_list").val('');
            $("#st_working_days").val('');
        } else {
            alert("Please enter valid data ...");
        }
    }
    //Add Remarsks
    function add_remarks() {
        var url = 'remote/add_remarks',
                data = {},
                description = '',
                status;

        status = $("#default-tab-4-form").valid();
        description = $("#sc_descryption");

        if (status) {
            data.sc_rem_student_id = $("#student_list").val();
            data.sc_rem_description = description.val();
            ajax_send_data(url, data);
            description.val('');

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
                //console.log(responseText);
                alert("done");
            }

        });

    }

    //Enables the student information tab
    function enable_student_info_tab(student) {
              $("#default-tab-1").html("Name :" + student.sc_stu_name + " " + student.sc_stu_initial_name
                    + "<br/>" +
                    " Parent Name :" + student.sc_stu_parent_name + "<br/>" +
                    "Phone Number 1 :" + student.sc_stu_phone1 + "<br/>" +
                    "Phone Number 2 :" + student.sc_stu_phone2 + "<br/>" +
                    "Address :" + student.sc_stu_address + "<br/>" +
                    "Blood group :" + student.sc_blood_group + "<br/>" +
                    '<img src="' + baseurl + "store/student_images/"
                    + student.sc_stu_photo_url + '" alt="student" widht="30" height="30"/>' +
                    "<br/>Login details" + "<br/>" +
                    "User Name :" + student.sc_use_user_name + "<br/>" +
                    "Password :" + student.sc_use_password + "<br/>" +
                    "Created Date :" + student.sc_created_date + "<br/>"
                    );
            var link=$('<a>',{href: baseurl+'admin/student_add/'+student.sc_stu_id });
                var button = $('<button>', {type: 'button', class: "btn btn-sm btn-success",
        text: "Edit Student"
    });
    link.append(button);
         $("#default-tab-1").append(link);   

       // });

        //enable student info tab
        $(".nav-tabs li").removeClass("active");
        $(".nav-tabs :first-child").addClass("active");
        $(".tab-content div").removeClass("active in");
        $("#default-tab-1").addClass("active in");

    }

    //gets the selected user details
    function get_student_detail(student_id) {
        var post_url = baseurl + 'remote/singel_student',
                result = "";

        $.ajax({
            url: post_url,
            type: "POST",
            data: {'student_id': student_id},
            async: false,
            dataType: 'json',
            success: function(responseText) {
                result = responseText;
            }

        });

        return result;

    }



    //returns the student image   
    function format(student) {
        var originalOption = student.element;

        if ($(originalOption).val() === "0")
            return student.text;

        return "<img class='flag' src='" + baseurl + "store/student_images/" + $(originalOption).data('url') + "' widht=10 height=10/>  " + student.text;
    }


//To markup the exam list select box
//@param element_name -- domelement name
//@param class_names -- all options values
    function markup_exams_list_box(element_name, class_names)
    {//console.log("markup");
        $('#' + element_name + '  option:gt(0)').remove().end();
        $.each(class_names, function(index, value) {
            $('#' + element_name).append($('<option/>', {
                value: value.sc_exa_id,
                text: value.sc_exa_name 
                
            }));
        });

        //
    }
    
//Brings the class related cross tables data from db
function get_db_class_objects(class_id, type) {
    var post_url = baseurl + 'remote/get_class_object_list',
            result = "";
    $.ajax({
        url: post_url,
        type: "POST",
        data: {type: type, class_id: class_id},
        async: false,
        dataType: 'json',
        success: function(responseText) {
            result = responseText;
        }

    });

    return result;
}    

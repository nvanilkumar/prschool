<?php
//Get the first parameter value
$form_name = $this->uri->segment(3);
//Form Labels Preparation
 $lables_array = array("pageheader" => "Exams",
        "page-title" => "Exams Wizard",
        "th1" => "Exam Name",
        "th2" => "Exam Descryption",
        "td1" => "sc_exa_name",
        "td2" => "sc_exa_descryption",
        "td3" => "sc_exa_id"
    );
?>
 <div class="row"><!-- begin row -->
    <h1 class="page-header"><?= $lables_array["pageheader"]; ?></h1>
    <div class="col-md-12 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">

                <h4 class="panel-title"><?= $lables_array["page-title"]; ?></h4>
            </div>
            <div class="panel-body">
                <?php if (@$edit_message == "set") { ?>
                    <div class="alert alert-info fade in m-b-15">
                        <strong>Info!</strong>
                        Successfully updated the content
                        <span class="close" data-dismiss="alert">×</span>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <label class="col-md-3 control-label ui-sortable">Class Name</label>
                    <div class="col-md-9 ui-sortable">
                        <select class="form-control" id="class_id">
                            <option value="0">Select the class</option>

                        </select>

                    </div>
                </div>

                <br/><br/>

                <div class="form-group">
                    <label class="col-md-3 control-label ui-sortable">Section Name</label>
                    <div class="col-md-9 ui-sortable">
                        <select class="form-control" id="section_list">
                            <option value="000">Select the section</option>

                        </select>

                    </div>
                    <input type="hidden" name="class_value" id="class_value"
                           value="0" />
                </div>
                <br/> <br/>
                <div class="form-group">
                    <label class="col-md-3 control-label ui-sortable">Student List</label>
                    <div class="col-md-9 ui-sortable">
                        <select class="form-control" id="student_list">
                            <option value="0">Select the student</option>

                        </select>

                    </div>
                    <input type="hidden" name="class_value" id="class_value"
                           value="0" />
                </div>
                <br/> <br/>


                <div class="col-md-12 ui-sortable">
                    <ul class="nav nav-tabs">
                        <li class=""><a href="#default-tab-1" data-toggle="tab">Student Information Tab</a></li>
                        <li class=""><a href="#default-tab-2" data-toggle="tab">Attendance Tab</a></li>
                        <li class=""><a href="#default-tab-3" id="marks-tab" data-toggle="tab">Marks Tab</a></li>
                        <li class="active"><a href="#default-tab-4" data-toggle="tab">Remarks Tab</a></li>
                        <li class="active"><a href="#default-tab-5" data-toggle="tab">Payments Tab</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="default-tab-1">

                            student info
                        </div>
                        <div class="tab-pane fade" id="default-tab-2">
                            <form id="default-tab-2-form" method="post" action="">
                                <div class="form-group">
                                    <label class="col-md-3 control-label ui-sortable">Month Names</label>
                                    <div class="col-md-9 ui-sortable">
                                        <select class="form-control required" id="month_list"
                                                title="Please select the month">
                                            <option value="">Select the month</option>
                                            <?php
                                            foreach ($month_details as $details) {
                                                ?>
                                                <option value="<?= $details->sc_wor_id ?>">
                                                    <?= $details->sc_wor_month ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>

                                </div>
                                <div class="form-group" id="class_div">
                                    <label class="col-md-3 control-label ui-sortable">No of attended days</label>
                                    <div class="col-md-9 ui-sortable">
                                        <input type="text" class="form-control required"
                                               title="Please enter the value"
                                               name="sc_sub_name" id="st_working_days" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 ui-sortable"></label>
                                    <div class="col-md-6 col-sm-6 ui-sortable">
                                        <button type="button" name="submit" id="att_button"
                                                value="submit" class="btn btn-sm btn-success">Submit Button</button>
                                    </div>   

                                </div>
                            </form>      

                        </div>

                        <div class="tab-pane fade active in" id="default-tab-3">
                            <form action="" method="post" id="subjects_form" name="subjects_form">
                      <div id="exams_div">
                          <select name="exams_list" id="exams_list"> 
                              <option>select the exam </option>
                          </select>
                      </div>          
                      <div id="subjects_div"> 
                          
                      </div>
                        
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 ui-sortable"></label>

                        <div class="col-md-6 col-sm-6 ui-sortable">
                             <button type="button" name="submit" value="submit" id="class_exam_subject" class="btn btn-sm btn-success">Submit Button</button>
                        </div>   

                    </div>  
                    </form>
                           
                        </div>

                        <div class="tab-pane fade active in" id="default-tab-4">
                            <form id="default-tab-4-form" method="post" action="">
                                <div class="form-group">
                                    <label class="col-md-3 control-label ui-sortable">Description</label>
                                    <div class="col-md-9 ui-sortable">
                                        <textarea class="form-control required" 
                                 name="sc_descryption" id="sc_descryption" placeholder="Textarea" 
                                 rows="5" title="Please enter the value" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 ui-sortable"></label>
                                    <div class="col-md-6 col-sm-6 ui-sortable">
                                        <button type="button" name="submit" id="remarks_button"
                                                value="submit" class="btn btn-sm btn-success">Submit Button</button>
                                    </div>   

                                </div>
                            </form>   
                        </div>
                        <div class="tab-pane fade active in" id="default-tab-5">
                            <form id="default-tab-5-form" method="post" action="">
                               <div class="form-group" id="class_div">
                                    <label class="col-md-3 control-label ui-sortable">Parent Name</label>
                                    <div class="col-md-9 ui-sortable">
                                        <input type="text" class="form-control required"
                                               title="Please enter the value"
                                               name="sc_pay_name" id="sc_pay_name" value="">
                                    </div>
                                </div>
                                
                                <div class="form-group" id="class_div">
                                    <label class="col-md-3 control-label ui-sortable">Amount</label>
                                    <div class="col-md-9 ui-sortable">
                                        <input type="text" class="form-control required"
                                               title="Please enter the value"
                                               name="sc_pay_amount" id="sc_pay_amount" value="">
                                    </div>
                                </div>
                                <div class="form-group" id="class_div">
                                    <label class="col-md-3 control-label ui-sortable">Payment Date</label>
                                    <div class="col-md-9 ui-sortable">
                                        <input type="text" class="form-control required"
                                               title="Please enter the value"
                                               name="sc_pay_date"  id="sc_pay_date" value="">
<!--                                        -->
                                    </div>
                                </div>
                                <div class="form-group" id="class_div">
                                    <label class="col-md-3 control-label ui-sortable">Payment Mode</label>
                                    <div class="col-md-9 ui-sortable">
                                        <input type="text" class="form-control required"
                                               title="Please enter the value"
                                               name="sc_pay_mode" id="sc_pay_mode" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label ui-sortable">Description</label>
                                    <div class="col-md-9 ui-sortable">
                                        <textarea class="form-control required" 
                                 name="sc_pay_description" id="sc_pay_description" placeholder="Textarea" 
                                 rows="5" title="Please enter the value" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 ui-sortable"></label>
                                    <div class="col-md-6 col-sm-6 ui-sortable">
                                        <button type="button" name="submit" id="payment_button"
                                                value="submit" class="btn btn-sm btn-success">Submit Button</button>
                                    </div>   

                                </div>
                            </form>   
                        </div>

                    </div>

                </div>



            </div>
        </div>
        <!-- end panel -->
    </div>

</div><!-- end row -->
<link href="<?= PLUGIN_PATH ?>bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
<link href="<?= PLUGIN_PATH ?>bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />

<link href="<?= PLUGIN_PATH ?>select2/select2.css" rel="stylesheet"/>
<script src="<?= PLUGIN_PATH ?>select2/select2.js"></script>
<script type="text/javascript"  src="<?= JS_PATH ?>jquery.validate.js"></script>
<script type="text/javascript"  src="<?= JS_PATH ?>common_functions.js"></script>
<script src="<?= PLUGIN_PATH ?>bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script>
    var main_class_id = "",
            main_class = "";

    $(function() {

        $('#sc_pay_date').datepicker({
                    format: "yyyy-mm-dd"
         });  

        //decorate the student list box
        decorate_student();

        //On click on section & class data
        $('#class_id, #section_list').click(function() {
            var class_id = $(this).val();
            $("#class_value").val(class_id);

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
        $("#marks-tab").click(function(){
             student_subjects_markup();
            var objects_list ="";
            objects_list = get_db_class_objects($("#class_value").val(),"class_exams");
            markup_exams_list_box("exams_list",objects_list);
            
        });
        
        
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
            data.subjects=$("#subjects_form").serialize();
             
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
                console.log(responseText);
                alert("done");
            }

        });

    }

    //Enables the student information tab
    function enable_student_info_tab(student_details) {
        $.each(student_details, function(index, value) {
            $("#default-tab-1").html("Name :" + value.sc_stu_name + " " + value.sc_stu_initial_name
                    + "<br/>" +
                    " Parent Name :" + value.sc_stu_parent_name + "<br/>" +
                    "Phone Number 1 :" + value.sc_stu_phone1 + "<br/>" +
                    "Phone Number 2 :" + value.sc_stu_phone2 + "<br/>" +
                    "Address :" + value.sc_stu_address + "<br/>" +
                    "Blood group :" + value.sc_blood_group + "<br/>" +
                    '<img src="' + baseurl + "store/student_images/"
                    + value.sc_stu_photo_url + '" alt="student" widht="30" height="30"/>' +
                    "<br/>Login details" + "<br/>" +
                    "User Name :" + value.sc_use_user_name + "<br/>" +
                    "Password :" + value.sc_use_password + "<br/>" +
                    "Created Date :" + value.sc_created_date + "<br/>"
                    );

        });

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

    //makeup the student listbox
    function decorate_student() {
        $("#student_list").select2({
            formatResult: format,
            formatSelection: format

        });
    }

    //returns the student image   
    function format(student) {
        var originalOption = student.element;

        if ($(originalOption).val() === "0")
            return student.text;

        return "<img class='flag' src='" + baseurl + "store/student_images/" + $(originalOption).data('url') + "' widht=10 height=10/>  " + student.text;
    }

//Brings the class related cross tables data from db
    function get_student_list(class_id) {
        var post_url = baseurl + 'remote/class_student_list',
                result = "",
                type = $("#page_type").val()
                ;
        $.ajax({
            url: post_url,
            type: "POST",
            data: {class_id: class_id},
            async: false,
            dataType: 'json',
            success: function(responseText) {
                result = responseText;
            }

        });

        return result;
    }

//To markup the select box
//@param element_name -- domelement name
//@param class_names -- all options values
    function markup_student_select_box(element_name, class_names)
    {
        $('#' + element_name + '  option:gt(0)').remove().end();
        $.each(class_names, function(index, value) {
            $('#' + element_name).append($('<option/>', {
                value: value.sc_stu_id,
                text: value.sc_stu_name + ' ' + value.sc_stu_initial_name,
                'data-url': value.sc_stu_photo_url
            }));
        });

        //
    }
//To markup the exam list select box
//@param element_name -- domelement name
//@param class_names -- all options values
    function markup_exams_list_box(element_name, class_names)
    {console.log("markup");
        $('#' + element_name + '  option:gt(0)').remove().end();
        $.each(class_names, function(index, value) {
            $('#' + element_name).append($('<option/>', {
                value: value.sc_exa_id,
                text: value.sc_exa_name 
                
            }));
        });

        //
    }


</script>


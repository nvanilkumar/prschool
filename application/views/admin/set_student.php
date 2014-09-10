<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <div class="row"><div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-header widget-header-blue widget-header-flat">
                                <h4 class="lighter">Add Student</h4>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="step-content row-fluid position-relative" id="step-container">
                                        <div class="step-pane active" id="step1">



                                            <?php if (@$edit_message == "set") { ?>
                                                <div class="alert alert-info fade in m-b-15">
                                                    <strong>Info!</strong>
                                                    Successfully updated the content
                                                    <span class="close" data-dismiss="alert">×</span>
                                                </div>
                                            <?php } ?>
                                            <form action="" method="POST" class="form-horizontal" name="add_student_form" 
                                                  id="add_student_form" enctype="multipart/form-data">

                                                <div class="space-4"></div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Class</label>

                                                    <div class="col-sm-9">
                                                        <select class="col-xs-10 col-sm-5" id="class_id">
                                                            <option value="0">Select the class</option>

                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="space-4"></div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Section</label>

                                                    <div class="col-sm-9">

                                                        <select class="col-xs-10 col-sm-5" id="section_list">
                                                            <option value="000">Select the section</option>

                                                        </select>
                                                        <input type="hidden" name="class_value" id="class_value" value="" />

                                                    </div>
                                                </div>

                                                <div class="space-4"></div>


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Student Id</label>

                                                    <div class="col-sm-9">
                                                        <input type="text" placeholder="Student Id" class="col-xs-10 col-sm-5" 
                                                               name="sc_use_user_name"
                                                               id="sc_use_user_name" 
                                                               value = "<?= @$user_details->sc_use_user_name ?>">

                                                    </div>
                                                </div>

                                                <div class="space-4"></div>


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Email</label>

                                                    <div class="col-sm-9">
                                                        <input type="text" placeholder="Email" class="col-xs-10 col-sm-5" 
                                                               name="sc_use_email"
                                                               id="sc_use_email" 
                                                               value = "<?= @$user_details->sc_use_email ?>">

                                                    </div>
                                                </div>
                                                <div class="space-4"></div>


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Student Name</label>

                                                    <div class="col-sm-9">
                                                        <input type="text" placeholder="Student Name" class="col-xs-10 col-sm-5" 
                                                               name="sc_stu_name"
                                                               id="sc_stu_name" 
                                                               value = "<?= @$details->sc_stu_name ?>">

                                                    </div>
                                                </div>
                                                <div class="space-4"></div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Photo</label>

                                                    <div class="col-sm-9">

                                                        <input type="file" name="photo" id="photo" class="col-xs-10 col-sm-5">
                                                        <?php
                                                        //echo strlen(@$details->sc_stu_photo_url);
                                                        if (strlen(@$details->sc_stu_photo_url) > 0) {
                                                            ?>

                                                            <img src="<?= base_url() . 'store/student_images/' .
                                                        @$details->sc_stu_photo_url
                                                            ?>" width="50" height="50">           
<?php } ?>
                                                        <input type="hidden" class="form-control" 
                                                               name="sc_stu_photo_url"
                                                               id="sc_stu_photo_url" 
                                                               value = "<?= @$details->sc_stu_photo_url ?>">                   


                                                    </div>
                                                </div>
                                                <div class="space-4"></div>


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Surname</label>

                                                    <div class="col-sm-9">
                                                        <input type="text" class="col-xs-10 col-sm-5" 
                                                               name="sc_stu_initial_name"
                                                               id="sc_stu_initial_name" 
                                                               value = "<?= @$details->sc_stu_initial_name ?>">

                                                    </div>
                                                </div>
                                                <div class="space-4"></div>


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Parent Name</label>

                                                    <div class="col-sm-9">
                                                        <input type="text" placeholder="Parent Name" class="col-xs-10 col-sm-5" 
                                                               name="sc_stu_parent_name"
                                                               id="sc_stu_parent_name" 
                                                               value = "<?= @$details->sc_stu_parent_name ?>">

                                                    </div>
                                                </div>
                                                <div class="space-4"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Contact Number</label>

                                                    <div class="col-sm-9">
                                                        <input type="text" placeholder="Conatct Number" class="col-xs-10 col-sm-5" 
                                                               name="sc_stu_phone1"
                                                               id="sc_stu_phone1" 
                                                               value = "<?= @$details->sc_stu_phone1 ?>">

                                                    </div>
                                                </div>

                                                <div class="space-4"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Contact Number2</label>

                                                    <div class="col-sm-9">
                                                        <input type="text" placeholder="Contact Number2" class="col-xs-10 col-sm-5" 
                                                               name="sc_stu_phone2"
                                                               id="sc_stu_phone2" 
                                                               value = "<?= @$details->sc_stu_phone2 ?>">

                                                    </div>
                                                </div>

                                                <div class="space-4"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2">Blood Group</label>

                                                    <div class="col-sm-9">
                                                        <input type="text" placeholder="Blood Group" class="col-xs-10 col-sm-5" 
                                                               name="sc_blood_group"
                                                               id="sc_blood_group" 
                                                               value = "<?= @$details->sc_blood_group ?>">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Address</label>

                                                    <div class="col-sm-9">
                                                        <textarea placeholder="Address" class="col-xs-10 col-sm-5" name="sc_stu_address" 
                                                                  id="sc_stu_address" 
                                                                  rows="5"><?= @$details->sc_stu_address ?></textarea>

                                                    </div>
                                                </div>

                                                <div class="space-4"></div>

                                        </div>
                                    </div>

                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">

                                            <input type="hidden" value="<?= (@$form_type == 'Add') ? 'Add' : 'Edit'; ?>" name="type" />
                                            <input type="hidden" name="sc_stu_id" id="sc_stu_id" 
                                                   value="<?= @$details->sc_stu_id ?>" />
                                            <input type="hidden" name="sc_stu_user_id" id="sc_stu_user_id" 
                                                   value="<?= @$details->sc_stu_user_id ?>" />
                                            <button type="submit" name="submit" 
                                                    value="submit" class="btn btn-info"><i class="icon-ok bigger-110"></i>Submit  </button>





                                        </div>
                                    </div>
                                </div><!-- /widget-main -->
                            </div><!-- /widget-body -->
                        </div>
                    </div>
                </div></div><!-- /row -->

            <div class="hr hr32 hr-dotted"></div>


            </form>


            <!-- /row -->

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>
<script type="text/javascript"  src="<?= JS_PATH ?>jquery.validate.js"></script>
<script type="text/javascript"  src="<?= JS_PATH ?>common_functions.js"></script>

<script>
    var main_class_id = '<?=
(@$class_details->sc_cls_main_class > 0) ?
    @$class_details->sc_cls_main_class : ""
?>';
    var main_class = "",
            section_id = '<?=
(@$class_details->sc_cls_id > 0) ?
    @$class_details->sc_cls_id : ""
?>';


    $(function() {

        //To edit student information set class & section ids
        var section_list_id="";
        if (main_class_id !== "") {
             
            $("#class_id").val(main_class_id);
            $("#class_value").val(section_id);
            section_list_id=main_class_id;
            
        }else{  
            $("#class_value").val(section_id);
             $("#class_id").val(section_id);
              section_list_id=section_id;
        }
        //markup select box
        var class_list_array = get_class_list(section_list_id);
        markup_select_box("section_list", class_list_array);
        $("#section_list").val(section_id);

        //On click on section & class data
        $('#class_id, #section_list').click(function() {
            var class_id = $(this).val();
            $("#class_value").val(class_id);
        });

        $('#add_student_form').validate({
            ignore: "",
            rules: {
                class_value: {
                    required: true,
                },
                sc_use_user_name: {
                    required: true,
                },
                sc_use_email: {
                    required: true,
                    email: true
                },
                sc_stu_name: {
                    required: true,
                },
                sc_stu_initial_name: {
                    required: true,
                },
                sc_stu_parent_name: {
                    required: true,
                },
                sc_stu_address: {
                    required: true,
                }

            },
            messages: {
                class_value: {
                    required: "Please select the class ...!"
                },
                sc_use_user_name: {
                    required: "Please enter the user name",
                },
                sc_use_email: {
                    required: "Please enter the email",
                },
                sc_stu_name: {
                    required: "Please enter the student name",
                },
                sc_stu_initial_name: {
                    required: "Please enter the student initial name",
                },
                sc_stu_parent_name: {
                    required: "Please enter the student parent name",
                },
                sc_stu_address: {
                    required: "Please enter the student address",
                }
            }

        });
    });
</script>   

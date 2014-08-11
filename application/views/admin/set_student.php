<div class="row"><!-- begin row -->
    <h1 class="page-header">Student Form</h1>
    <div class="col-md-12 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">

                <h4 class="panel-title">Student wizard</h4>
            </div>
            <div class="panel-body">
                <?php if (@$edit_message == "set") { ?>
                    <div class="alert alert-info fade in m-b-15">
                        <strong>Info!</strong>
                        Successfully updated the content
                        <span class="close" data-dismiss="alert">×</span>
                    </div>
                <?php } ?>
                <form action="" method="POST" class="add_student_form" name="exam_subject_form" 
                      id="class_form" enctype="multipart/form-data">
                    
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
                    
                    
                    <div class="form-group" id="class_div">
                        <label class="col-md-3 control-label ui-sortable">Student UserId </label>
                        <div class="col-md-9 ui-sortable" >
                            <input type="text" class="form-control" 
                                   name="sc_use_user_name"
                                   id="sc_use_user_name" 
                                   value = "<?= @$user_details->sc_use_user_name?>">
                        </div>
                    </div>
                    <div class="form-group" id="class_div">
                        <label class="col-md-3 control-label ui-sortable">Email </label>
                        <div class="col-md-9 ui-sortable" >
                            <input type="text" class="form-control" 
                                   name="sc_use_email"
                                   id="sc_use_email" 
                                   value = "<?= @$user_details->sc_use_email?>">
                        </div>
                    </div>
                  <div class="form-group" id="class_div">
                        <label class="col-md-3 control-label ui-sortable">Student Name </label>
                        <div class="col-md-9 ui-sortable" >
                            <input type="text" class="form-control" 
                                   name="sc_stu_name"
                                   id="sc_stu_name" 
                                   value = "<?= @$details->sc_stu_name?>">
                        </div>
                    </div>
                    <div class="form-group" id="class_div">
                        <label class="col-md-3 control-label ui-sortable">Surname </label>
                        <div class="col-md-9 ui-sortable" >
                            <input type="text" class="form-control" 
                                   name="sc_stu_initial_name"
                                   id="sc_stu_initial_name" 
                                   value = "<?= @$details->sc_stu_initial_name?>">
                        </div>
                    </div>
                    <div class="form-group" id="class_div">
                        <label class="col-md-3 control-label ui-sortable">Parent Name </label>
                        <div class="col-md-9 ui-sortable" >
                            <input type="text" class="form-control" 
                                   name="sc_stu_parent_name"
                                   id="sc_stu_parent_name" 
                                   value = "<?= @$details->sc_stu_parent_name?>">
                        </div>
                    </div>
                    <div class="form-group" id="class_div">
                        <label class="col-md-3 control-label ui-sortable">Contact Number </label>
                        <div class="col-md-9 ui-sortable" >
                            <input type="text" class="form-control" 
                                   name="sc_stu_phone1"
                                   id="sc_stu_phone1" 
                                   value = "<?= @$details->sc_stu_phone1?>">
                        </div>
                    </div>
                    <div class="form-group" id="class_div">
                        <label class="col-md-3 control-label ui-sortable">Contact Number 2 </label>
                        <div class="col-md-9 ui-sortable" >
                            <input type="text" class="form-control" 
                                   name="sc_stu_phone2"
                                   id="sc_stu_phone2" 
                                   value = "<?= @$details->sc_stu_phone2?>">
                        </div>
                    </div>
                    <div class="form-group" id="class_div">
                        <label class="col-md-3 control-label ui-sortable">Blood Group </label>
                        <div class="col-md-9 ui-sortable" >
                            <input type="text" class="form-control" 
                                   name="sc_blood_group"
                                   id="sc_blood_group" 
                                   value = "<?= @$details->sc_blood_group?>">
                        </div>
                    </div>
                    <div class="form-group" id="class_div">
                        <label class="col-md-3 control-label ui-sortable">Address </label>
                        <div class="col-md-9 ui-sortable" >
                            <textarea class="form-control" name="sc_stu_address" 
                                      id="sc_stu_address" 
                                      placeholder="Textarea" rows="5"><?= @$details->sc_stu_address ?></textarea>
                            
                        </div>
                    </div>
                    <div class="form-group" id="class_div">
                        <label class="col-md-3 control-label ui-sortable">Student Photo </label>
                        <div class="col-md-9 ui-sortable" >
                            <input type="file" name="photo" id="photo">
                            <?php
                            //echo strlen(@$details->sc_stu_photo_url);
                            if(strlen(@$details->sc_stu_photo_url) > 0 )
                            { ?>
                             
                            <img src="<?= base_url().'store/student_images/'.
                                @$details->sc_stu_photo_url ?>" width="50" height="50">           
                            <?php } ?>
                            <input type="hidden" class="form-control" 
                                   name="sc_stu_photo_url"
                                   id="sc_stu_photo_url" 
                                   value = "<?= @$details->sc_stu_photo_url?>">
                        </div>
                    </div>


                    <div class="col-md-6 col-sm-6 ui-sortable">

                        <input type="hidden" value="<?= (@$form_type == 'Add') ? 'Add' : 'Edit'; ?>" name="type" />
                        <input type="hidden" name="sc_stu_id" id="sc_stu_id" 
                               value="<?= @$details->sc_stu_id ?>" />
                        <input type="hidden" name="sc_stu_user_id" id="sc_stu_user_id" 
                               value="<?= @$details->sc_stu_user_id ?>" />
                        <button type="submit" name="submit" 
                                value="submit" class="btn btn-sm btn-success">Submit Button</button>
                    </div>   


                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>

</div><!-- end row -->

<script type="text/javascript"  src="<?= JS_PATH ?>jquery.validate.js"></script>
<script type="text/javascript"  src="<?= JS_PATH ?>common_functions.js"></script>
<script>
    $(function(){
        $('#add_student_form').validate({
            rules: {
				class_value: {
					required: true,
				} 
				sc_use_user_name: {
					required: true,
				} 
				sc_use_email: {
					required: true,
                    email: true
				} 
				sc_stu_name: {
					required: true,
				} 
				sc_stu_initial_name: {
					required: true,
				} 
				sc_stu_parent_name: {
					required: true,
				} 
				sc_stu_address: {
					required: true,
				} 
				
			},
			
			messages: {
                class_value: {
					required: true,
				} 
				sc_use_user_name: {
					required: true,
				} 
				sc_use_email: {
					required: true,
				} 
				sc_stu_name: {
					required: true,
				} 
				sc_stu_initial_name: {
					required: true,
				} 
				sc_stu_parent_name: {
					required: true,
				} 
				sc_stu_address: {
					required: true,
				} 
				
 
				org_id: {
					required: "Please select organization ...!",
				},
				manager_id: {
					required: "Please select manager ...!",
				} 
			} 
        });
    });
</script>    
<!--<script type="text/javascript"  src="<?= JS_PATH ?>class_details.js"></script>-->


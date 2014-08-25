<?php
//Get the first parameter value
$form_name = $this->uri->segment(3);
//Form Labels Preparation
$lables_array = array("pageheader" => "Add Student Information",
    "page-title" => "Add Student Information",
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


                <div class="col-md-12 ui-sortable"  id="student_information_div" style="display:none;">
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

                                </div><br/><br/><br/>
                                <div class="form-group" id="class_div">
                                    <label class="col-md-3 control-label ui-sortable">No of attended days</label>
                                    <div class="col-md-9 ui-sortable">
                                        <input type="text" class="form-control required"
                                               title="Please enter the value"
                                               name="sc_sub_name" id="st_working_days" value="">
                                    </div>
                                </div>
                                <br/><br/>
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
                                <div class="form-group">
                                    <label class="col-md-3 control-label ui-sortable">Exam Names</label>
                                    <div class="col-md-9 ui-sortable" id="exams_div">
                                        <select name="exams_list" id="exams_list"
                                                class="form-control required"  title="Please select the exam"> 
                                            <option>select the exam </option>
                                        </select> 

                                    </div>

                                </div><br/><br/>          
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
                                </div><br/><br/>
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
                                </div><br/><br/><br/>

                                <div class="form-group" id="class_div">
                                    <label class="col-md-3 control-label ui-sortable">Amount</label>
                                    <div class="col-md-9 ui-sortable">
                                        <input type="text" class="form-control required"
                                               title="Please enter the value"
                                               name="sc_pay_amount" id="sc_pay_amount" value="">
                                    </div>
                                </div><br/><br/>
                                <div class="form-group" id="class_div">
                                    <label class="col-md-3 control-label ui-sortable">Payment Date</label>
                                    <div class="col-md-9 ui-sortable">
                                        <input type="text" class="form-control required"
                                               title="Please enter the value"
                                               name="sc_pay_date"  id="sc_pay_date" value="">
                                        <!--                                        -->
                                    </div>
                                </div><br/><br/>
                                <div class="form-group" id="class_div">
                                    <label class="col-md-3 control-label ui-sortable">Payment Mode</label>
                                    <div class="col-md-9 ui-sortable">
                                        <input type="text" class="form-control required"
                                               title="Please enter the value"
                                               name="sc_pay_mode" id="sc_pay_mode" value="">
                                    </div>
                                </div><br/><br/>
                                <div class="form-group">
                                    <label class="col-md-3 control-label ui-sortable">Description</label>
                                    <div class="col-md-9 ui-sortable">
                                        <textarea class="form-control required" 
                                                  name="sc_pay_description" id="sc_pay_description" placeholder="Textarea" 
                                                  rows="5" title="Please enter the value" ></textarea>
                                    </div>
                                </div><br/><br/><br/>
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
<script type="text/javascript"  src="<?= JS_PATH ?>student_operations.js"></script>
<script>
    var main_class_id = "",
            main_class = "";

</script>


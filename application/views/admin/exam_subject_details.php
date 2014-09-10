<?php
//Get the first parameter value
$form_name = $this->uri->segment(3);
//Form Labels Preparation
if ($form_name === "subjects") {
    $lables_array = array("pageheader" => "Add New Subject",
        "page-title" => "Subject Wizard",
        "s_n_l" => "Subject Name",
        "sub_field_name" => "sc_sub_name",
        "sub_field_descripton" => "sc_sub_descryption"
    );
} else {
    $lables_array = array("pageheader" => "Exams",
        "page-title" => "Exam Wizard",
        "s_n_l" => "Exam Name",
        "sub_field_name" => "sc_exa_name",
        "sub_field_descripton" => "sc_exa_descryption"
    );
}
?>


<div class="page-content">


    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->



            <div class="row"><div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-header widget-header-blue widget-header-flat">
                                <h4 class="lighter"><?= $lables_array["pageheader"]; ?></h4>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="step-content row-fluid position-relative" id="step-container">
                                        <?php if (@$edit_message == "set") { ?>
                                            <div class="alert alert-info fade in m-b-15">
                                                <strong>Info!</strong>
                                                Successfully updated the content
                                                <span class="close" data-dismiss="alert">×</span>
                                            </div>
                                        <?php } ?>
                                        <form action="" method="POST" class="form-horizontal" name="exam_subject_form" 
                                              id="class_form">
                                            <div class="step-pane active" id="step1">




                                                <div class="space-4"></div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> <?= $lables_array["s_n_l"]; ?></label>

                                                    <div class="col-sm-9">
                                                        <input type="text" placeholder="subject Name" class="col-xs-10 col-sm-5" 
                                                               name="<?= $lables_array["sub_field_name"]; ?>"
                                                               id="<?= $lables_array["sub_field_name"]; ?>" 
                                                               value = "<?= @$details->$lables_array["sub_field_name"] ?>">

                                                    </div>
                                                </div>

                                                <div class="space-4"></div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Description</label>

                                                    <div class="col-sm-9">
                                                        <textarea class="col-xs-10 col-sm-5" name="<?= $lables_array["sub_field_descripton"]; ?>" 
                                                                  id="<?= $lables_array["sub_field_descripton"]; ?>" 
                                                                  placeholder="Description" rows="5"><?= @$details->$lables_array["sub_field_descripton"] ?></textarea>

                                                    </div>
                                                </div>

                                                <div class="space-4"></div>

                                            </div>



                                    </div>

                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <input type="hidden" value="<?= (@$form_type == 'Add') ? 'Add' : 'Edit'; ?>" name="type" />
                                            <button type="submit" name="submit" 
                                                    value="submit" class="btn btn-info"> <i class="icon-ok bigger-110"></i>
                                                Submit</button>




                                            <!--                                            <button class="btn" type="reset">
                                                                                            <i class="icon-undo bigger-110"></i>
                                                                                            Reset											</button>-->
                                        </div>
                                    </div>

                                    </form>
                                </div><!-- /widget-main -->
                            </div><!-- /widget-body -->
                        </div>
                    </div>
                </div></div><!-- /row -->

            <div class="hr hr32 hr-dotted"></div>





            <!-- /row -->

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->


<script type="text/javascript"  src="<?= JS_PATH ?>jquery.validate.js"></script>



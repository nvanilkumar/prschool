<?php
//Get the first parameter value
$form_name = $this->uri->segment(3);
//Form Labels Preparation
if ($form_name === "subjects") {
    $lables_array = array("pageheader" => "Subject",
        "page-title" => "Subject Wizard",
        "s_n_l" => "Subject",
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
                <form action="" method="POST" class="form-horizontal" name="exam_subject_form" 
                      id="class_form">

                    <div class="form-group" id="class_div">
                        <label class="col-md-3 control-label ui-sortable"><?= $lables_array["s_n_l"]; ?></label>
                        <div class="col-md-9 ui-sortable" >
                            <input type="text" class="form-control" 
                                   name="<?= $lables_array["sub_field_name"]; ?>"
                                   id="<?= $lables_array["sub_field_name"]; ?>" 
                                   value = "<?= @$details->$lables_array["sub_field_name"] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label ui-sortable">Description</label>
                        <div class="col-md-9 ui-sortable">
                            <textarea class="form-control" name="<?= $lables_array["sub_field_descripton"]; ?>" 
                                      id="<?= $lables_array["sub_field_descripton"]; ?>" 
                                      placeholder="Textarea" rows="5"><?= @$details->$lables_array["sub_field_descripton"] ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 ui-sortable">

                        <input type="hidden" value="<?= (@$form_type == 'Add') ? 'Add' : 'Edit'; ?>" name="type" />
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
<!--<script type="text/javascript"  src="<?= JS_PATH ?>class_details.js"></script>-->


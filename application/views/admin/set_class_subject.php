<?php
//Get the first parameter value
$form_name = $this->uri->segment(3);
//Form Labels Preparation
if ($form_name === "subjects") {
     $lables_array = array(
        "pageheader" => "Subject",
        "page-title" => "Subject Wizard",
        "th1" => "Subject Name",
        "th2" => "Subject Descryption",
        "td1" => "sc_sub_name",
        "td2" => "sc_sub_descryption",
        "td3" => "sc_sub_id"
     );
  
} else if ($form_name === "exams") {
      $lables_array = array("pageheader" => "Exams",
        "page-title" => "Exams Wizard",
        "th1" => "Exam Name",
        "th2" => "Exam Descryption",
        "td1" => "sc_exa_name",
        "td2" => "sc_exa_descryption",
        "td3" => "sc_exa_id" 
       
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

                <div class="form-group">
                    <label class="col-md-3 control-label ui-sortable">Class Name</label>
                    <div class="col-md-9 ui-sortable">
                        <select class="form-control" id="class_id">
                            <option value="0">Select the class</option>

                        </select>
                        <input type="hidden" name="sc_cls_main_class" 
                               id="sc_cls_main_class"   value=""/>
                        <input type="hidden" name="page_type" 
                               id="page_type" value="<?= $this->uri->segment(3); ?>"/>
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
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered dataTable"> 
                        <thead> 
                            <tr> 
                                <th class="header"><?= $lables_array["th1"]; ?></th> 
                                <th class="header"><?= $lables_array["th2"]; ?></th> 
                                <th class="header">Actions</th> 
                            </tr> 
                        </thead> 
                        <tbody>
                            <?php
                            foreach ($lists as $row_data) {
                                ?>
                                <tr> 
                                    <td><?= $row_data->$lables_array["td1"]; ?></td> 
                                    <td><?= $row_data->$lables_array["td2"]; ?></td> 

                                    <td>
                                        <input type="checkbox" name="sub_id[]" 
                                               class="subject_ids" value="<?= $row_data->$lables_array["td3"]; ?>"/>


                                    </td> 
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody> 
                    </table>

                </div>

            </div>
        </div>
        <!-- end panel -->
    </div>

</div><!-- end row -->

<link href="<?=PLUGIN_PATH ?>DataTables-1.9.4/css/data-table.css" rel="stylesheet" />
<script src="<?=PLUGIN_PATH ?>DataTables-1.9.4/js/jquery.dataTables.js"></script>
<script src="<?=PLUGIN_PATH ?>DataTables-1.9.4/js/data-table.js"></script>

<script>
    var main_class_id = "";
</script>
<script type="text/javascript"  src="<?= JS_PATH ?>set_class_object.js"></script>
<script type="text/javascript"  src="<?= JS_PATH ?>common_functions.js"></script>


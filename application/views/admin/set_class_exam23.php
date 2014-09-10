<?php
//Get the first parameter value
$form_name = $this->uri->segment(3);
 
?>
<div class="row"><!-- begin row -->
    <h1 class="page-header">Exams</h1>
    <div class="col-md-12 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">

                <h4 class="panel-title">Exams Wizard</h4>
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
                
                 <div class="form-group">
                    <label class="col-md-3 control-label ui-sortable">Exams List</label>
                    <div class="col-md-9 ui-sortable">
                        <select class="form-control" id="exam_list">
                            <option value="000">Select the exam</option>
                            <?php  
                            foreach ($lists as $row_data) {
                                ?>
                                <option value="<?=$row_data->sc_exa_id ?>">
                                    <?=$row_data->sc_exa_name ?> </option>
                                <?php
                            }
                            ?>

                        </select>

                    </div>
                    <input type="hidden" name="class_value" id="class_value"
                           value="0" />
                </div>
                
                <br/><br/>
                
                    <form action="" method="post" id="subjects_form" name="subjects_form">
                      <div id="subjects_div"> 

                          
                      </div>
                        
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 ui-sortable"></label>

                        <div class="col-md-6 col-sm-6 ui-sortable">
                            <input type="hidden" name="sc_cls_name" id="sc_cls_name" value=""> 
                            <input type="hidden" value="Add" name="type">
                            <button type="button" name="submit" value="submit" id="class_exam_subject"
                                    class="btn btn-sm btn-success">Submit Button</button>
                        </div>   

                    </div>  
                    </form>
                
                
            

            </div>
        </div>
        <!-- end panel -->
    </div>

</div><!-- end row -->

<link href="<?=PLUGIN_PATH ?>DataTables-1.9.4/css/data-table.css" rel="stylesheet" />
<script src="<?=PLUGIN_PATH ?>DataTables-1.9.4/js/jquery.dataTables.js"></script>
<script src="<?=PLUGIN_PATH ?>DataTables-1.9.4/js/data-table.js"></script>
<script type="text/javascript"  src="<?= JS_PATH ?>jquery.validate.js"></script>

<script>
    var main_class_id = "";
</script>

<script type="text/javascript"  src="<?= JS_PATH ?>common_functions.js"></script>
<script type="text/javascript"  src="<?= JS_PATH ?>set_class_object.js"></script>


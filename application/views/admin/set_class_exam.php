<?php
//Get the first parameter value
$form_name = $this->uri->segment(3);
 
?>
 <div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <div class="row"><div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-header widget-header-blue widget-header-flat">
                                <h4 class="lighter">Assign Exam to the class</h4>
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
                                           
                                                <div class="space-4"></div>
  <form action="" method="post" id="subjects_form" name="subjects_form" class="form-horizontal">
  
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Class</label>

                                                    <div class="col-sm-9">
                                                        <select class="col-xs-10 col-sm-5" id="class_id">
                                                            <option value="0">Select the class</option>

                                                        </select>
                                                         <input type="hidden" name="sc_cls_main_class" 
                               id="sc_cls_main_class"   value=""/>
                        <input type="hidden" name="page_type" 
                               id="page_type" value="<?= $this->uri->segment(3); ?>"/>

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
                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Exams</label>

                                                    <div class="col-sm-9">
                                                          <select class="col-xs-10 col-sm-5" id="exam_list">
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
                                                </div>

                                                <div class="space-4"></div>

     <div id="subjects_div"> 

                          
                      </div>

                                        </div>
                                    </div>

                                    <div class="clearfix form-actions">
                                        
                                                                                        
                                        
                                        <div class="col-md-offset-3 col-md-9">
                                             <input type="hidden" name="sc_cls_name" id="sc_cls_name" value=""> 
                            <input type="hidden" value="Add" name="type">
                           
                                           
                                            <button type="button" name="submit" id="class_exam_subject"
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

<link href="<?=PLUGIN_PATH ?>DataTables-1.9.4/css/data-table.css" rel="stylesheet" />
<script src="<?=PLUGIN_PATH ?>DataTables-1.9.4/js/jquery.dataTables.js"></script>
<script src="<?=PLUGIN_PATH ?>DataTables-1.9.4/js/data-table.js"></script>
<script type="text/javascript"  src="<?= JS_PATH ?>jquery.validate.js"></script>

<script>
    var main_class_id = "";
</script>

<script type="text/javascript"  src="<?= JS_PATH ?>common_functions.js"></script>
<script type="text/javascript"  src="<?= JS_PATH ?>set_class_object.js"></script>


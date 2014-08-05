<div class="row"><!-- begin row -->
    <h1 class="page-header">Class</h1>
    <div class="col-md-12 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">

                <h4 class="panel-title">Class Wizard</h4>
            </div>
            <div class="panel-body">
                <?php if (@$edit_message == "set") { ?>
                    <div class="alert alert-info fade in m-b-15">
                        <strong>Info!</strong>
                        Successfully updated the content
                        <span class="close" data-dismiss="alert">×</span>
                    </div>
                <?php } ?>
                <form action="" method="POST" class="form-horizontal" name="class_form" 
                      id="class_form">

                    <div class="form-group" id="class_div">
                        <label class="col-md-3 control-label ui-sortable">Class Name</label>
                        <div class="col-md-9 ui-sortable" >
                            <input type="text" class="form-control" 
                                   placeholder="class_name" name="class_name" id="class_name" 
                                   value = "<?= @$details->sc_cls_name ?>">
                        </div>
                    </div>


                    <div  id="section_div">
                        <div class="form-group">
                            <label class="col-md-3 control-label ui-sortable">Class Name</label>
                            <div class="col-md-9 ui-sortable">
                                <select class="form-control" id="class_id">
                                    <option value="000">Select the class</option>

                                </select>
                                <input type="hidden" name="sc_cls_main_class" 
                                       id="sc_cls_main_class"   value=""/>
                            </div>
                        </div>



                        <div class="form-group" id="class_details1">
                            <label class="col-md-3 control-label ui-sortable">Section Name</label>
                            <div class="col-md-9 ui-sortable" >
                                <input type="text" class="form-control" 
                                       placeholder="section_name" id="section_name" 
                                       value="<?= @$details->sc_cls_name ?>">
                            </div>
                        </div>

                    </div>    
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 ui-sortable"></label>

                        <div class="col-md-6 col-sm-6 ui-sortable">
                            <input type="hidden" name="sc_cls_name" id="sc_cls_name" value=""/> 
                            <input type="hidden" value="<?= ($form_type == 'Add') ? 'Add' : 'Edit'; ?>" name="type" />
                            <button type="submit" name="submit" 
                                    value="submit" class="btn btn-sm btn-success">Submit Button</button>
                        </div>   

                    </div>



                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>

</div><!-- end row -->
<script>
    var main_class_id = '<?=
                    (@$details->sc_cls_main_class > 0) ?
                        @$details->sc_cls_main_class : ""
                    ?>';
    var url_type='<?=$this->uri->segment(3); ?>';


</script>

<script type="text/javascript"  src="<?= JS_PATH ?>jquery.validate.js"></script>
<script type="text/javascript"  src="<?= JS_PATH ?>class_details.js"></script>
<script type="text/javascript"  src="<?= JS_PATH ?>common_functions.js"></script>

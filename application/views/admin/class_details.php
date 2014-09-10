<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row"><div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-header widget-header-blue widget-header-flat">
                                <h4 class="lighter">Add New Section</h4>
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
                                        <form action="" method="POST" class="form-horizontal" name="section_add_edit_form" 
                                              id="class_form">
                                           




                                                <div class="space-4"></div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Class Name</label>

                                                    <div class="col-sm-9">
     <input type="text" placeholder="Class Name" class="col-xs-10 col-sm-5" 
                             name="class_name" id="class_name" 
                          value = "<?= @$details->sc_cls_name ?>">
     <span> </span>
                                                    </div>
                                                </div>
                                                
                                                <div class="space-4"></div>
                                    
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Sections</label>

										<div class="col-sm-9">
											<select class="col-xs-10 col-sm-5" id="section_list" name="section_list[]" multiple="multiple">
															</select>
                                            <span> </span>
										</div>
									</div>

									<div class="space-4"></div>
                                    
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Subjects</label>

										<div class="col-sm-9">
											<select class="col-xs-10 col-sm-5" id="subject_list" name="subject_list[]" multiple="multiple">

															</select>
                                            <span> </span>
										</div>
									</div>
                                           
                                    </div>

                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                             <input type="hidden" name="sc_cls_main_class" 
                                       id="sc_cls_main_class"   value=""/>
                                            <input type="hidden" name="sc_cls_name" id="sc_cls_name" value=""/> 
                            <input type="hidden" value="<?= ($form_type == 'Add') ? 'Add' : 'Edit'; ?>" name="type" id="type" />
                                            <button type="submit" name="submit" 
                                                    value="submit" class="btn btn-info"> <i class="icon-ok bigger-110"></i>
                                                Submit</button>

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

<script>
    var main_class_id = '<?=
                    (@$details->sc_cls_main_class > 0) ?
                        @$details->sc_cls_main_class : ""
                    ?>';
    var url_type='<?=$this->uri->segment(3); ?>';
    var section_names='<?=json_encode($section_lists) ?>';
    var subject_names='<?=json_encode($subjects_lists) ?>';
    
    var selected_section_ids='<?=(@$selected_section_ids)?json_encode(@$selected_section_ids):""; ?>';
    var selected_subject_ids='<?=(@$selected_subject_ids)?json_encode(@$selected_subject_ids):""; ?>';
    
    $(function() {
        add_options_section_box("section_list", section_names);
        add_options_subject_box("subject_list", subject_names);
        
        //Edit form then select the section& subject list values
        if($("#type").val() === "Edit"){
            select_muliple_list_values("section_list",selected_section_ids);
            select_muliple_list_values("subject_list",selected_subject_ids);
        }
        
    });
    
//To markup the section & subject selec box
function add_options_section_box(element_name, options_list)
{ 
    options_list=JSON.parse(options_list);
    $.each(options_list, function(index, value ) {
    
        $('#' + element_name).append($('<option/>', {
            value: value.sc_sec_id,
            text: value.sc_sec_name
        }));
    });

}
function add_options_subject_box(element_name, options_list)
{ 
    options_list=JSON.parse(options_list);
    $.each(options_list, function(index, value ) {
    
        $('#' + element_name).append($('<option/>', {
            value: value.sc_sub_id,
            text: value.sc_sub_name
        }));
    });

}

//To select the select box options
function select_muliple_list_values(list_box_name, selected_list){
    if(selected_list.length > 10){
        selected_list=JSON.parse(selected_list);
        $.each(selected_list, function(i,e){
            $("#"+list_box_name+" option[value='" +e[Object.keys(e)[0]] + "']").prop("selected", true);
        });
    }
 
}

</script>

<script type="text/javascript"  src="<?= JS_PATH ?>jquery.validate.js"></script>
<script type="text/javascript"  src="<?= JS_PATH ?>class_details.js"></script>
<script type="text/javascript"  src="<?= JS_PATH ?>common_functions.js"></script>

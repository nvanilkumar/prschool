<!-- begin page-header -->
<h1 class="page-header">Student details  List </h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-12 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title">Table in Panel</h4>
            </div>

            <div class="panel-body">
                
                <form action="" method="post" name="selected_student" id="selected_student">
                
                    <div class="form-group">
                        <label class="col-md-3 control-label ui-sortable">Class Name</label>
                        <div class="col-md-9 ui-sortable">
                            <select class="form-control" id="class_id">
                                <option value="0">Select the class</option>

                            </select>

                        </div>
                    </div>
                    <br/><br/><br/>
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
                            <select class="form-control" id="student_list" name="student_list">
                                <option value="0">Select the student</option>

                            </select>

                        </div>
 
                    </div>
                    <br/> <br/>
                    <div class="form-group">
                        <label class="col-md-3 control-label ui-sortable">Select the type</label>
                        <div class="col-md-9 ui-sortable">
                            <select class="form-control" id="student_type" name="student_type">
                                <option value="0">Select the type</option>
                                <option value="marks">Student Marks</option>
                                <option value="remarks">Student Remarks</option>
                                <option value="attendence">Student Attendance</option>
                                <option value="payment">Student Payments</option>

                            </select>

                        </div>
 
                    </div>
                    <br/> <br/>
                    
                     <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 ui-sortable"></label>
                                    <div class="col-md-6 col-sm-6 ui-sortable">
                                         <input type="submit" name="submit" value="submit" class="btn btn-sm btn-success"/>
                                    </div>   

                                </div>
               
                    <!--<input type="hidden" name="submit" value="submit"/>-->
                   
                </form>
               
               <?php if(@$this->input->post('student_type') == "remarks"){ ?> 
               <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered dataTable"> 
                        <thead> 
                            <tr> 
                                <th class="header"></th> 
                                <th class="header">Remark Description</th> 
                                <th class="header">Created date</th>
                                <th class="header">Actions</th> 
                            </tr> 
                        </thead> 
                        <tbody>
                            <?php
                            $i = 1;
                            $previous_id = 0;//e($remarks);
                            foreach ($remarks as $row_data) {
 
                                    ?>
                                    <tr> 
                                        <td><?= $i ?></td> 
                                        <td><?= $row_data->sc_rem_description ?></td> 
                                        <td><?= $row_data->sc_rem_created_date ?></td> 
 
                                        <td>
                                            <a href="<?= BASEURL ?>admin/opertions/remarks/<?= $row_data->sc_rem_id ?>" class="btn btn-primary btn-xs m-r-5">Edit</a>

                                        </td> 
                                    </tr>
                                    <?php
                                   $i++;
                                }
                                
                           
                            ?>
                        </tbody> 
                    </table>

                </div>
               <?php } ?> 
                
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-12 -->
</div>
<!-- end row --> 
<link href="<?= PLUGIN_PATH ?>DataTables-1.9.4/css/data-table.css" rel="stylesheet" />
<script src="<?= PLUGIN_PATH ?>DataTables-1.9.4/js/jquery.dataTables.js"></script>
<script src="<?= PLUGIN_PATH ?>DataTables-1.9.4/js/data-table.js"></script>
<link href="<?= PLUGIN_PATH ?>select2/select2.css" rel="stylesheet"/>
<script src="<?= PLUGIN_PATH ?>select2/select2.js"></script>

<script type="text/javascript"  src="<?= JS_PATH ?>common_functions.js"></script>
<script>
 
    var main_class_id = '<?=
                    (@$class_details->sc_cls_main_class > 0) ?
                        @$class_details->sc_cls_main_class : ""
                    ?>';
    var main_class = "",
        section_id='<?=
                    (@$class_details->sc_cls_id > 0) ?
                        @$class_details->sc_cls_id : ""
                    ?>';
    var student_operation_type='<?=
                    ($this->input->post('student_type')) ?
                        $this->input->post('student_type') : ""
                    ?>';                
    
    $(function(){
       //decorate the student list box
//    $("#student_list").select2({
//        formatResult: format,
//        formatSelection: format
//    });
//    
//    
//    To set the student operation type
      if(student_operation_type.length > 0){
            $("#student_type").val(student_operation_type);
        }
     //To edit student information set class & section ids
     if(main_class_id ==="" && section_id.length > 0 ){
         $("#class_id").val(section_id);
          
         class_list_array = get_class_list(section_id);
         markup_select_box("section_list", class_list_array);
     }

        $("#student_type").click(function(){
            $("#selected_student").submit();
        });

        //On click on section & class data
        $('#class_id, #section_list').click(function() {
            var class_id = $(this).val();
            
            if( class_id > 0)
            $("#class_value").val(class_id);
            
            //hide student info div
            $("#student_information_div").hide();

            student_list_array = get_student_list(class_id);
            markup_student_select_box("student_list", student_list_array);

        });
    });

</script>
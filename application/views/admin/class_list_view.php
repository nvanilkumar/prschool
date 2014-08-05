<?php
$type=$this->uri->segment(3);

?>
<!-- begin page-header -->
<h1 class="page-header">Class List </h1>
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
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered dataTable"> 
                        <thead> 
                            <tr> 
                                <th class="header"></th> 
                                <th class="header">Class Name</th> 
                                <th class="header">Subject Names</th>
                                <?php if($type != 'section'){ ?>
                                <th class="header">Section Names</th> 
                                <?php } ?>
                                <th class="header">Actions</th> 
                            </tr> 
                        </thead> 
                        <tbody>
                            <?php
                            $i = 1;
                            $previous_id = 0;
                            foreach ($lists as $row_data) {
                                if ($row_data->sc_cls_id != $previous_id) {
                                    ?>
                                    <tr> 
                                        <td><?= $i ?></td> 
                                        <td><?= $row_data->sc_cls_name ?></td> 

                                       
                                        <td> <?= subject_list($lists, $row_data->sc_cls_id,'subject' ) ?> </td>
                                         <?php if($type != 'section'){ ?>
                                        <td><?= subject_list($section_lists, $row_data->sc_cls_id,'section') ?> </td><?php } ?>
                                         <td>
                                            <a href="<?= BASEURL ?>admin/opertions/class/<?= $row_data->sc_cls_id ?>" class="btn btn-primary btn-xs m-r-5">Edit</a>

                                        </td> 
                                    </tr>
                                    <?php
                                    $previous_id = $row_data->sc_cls_id;
                                }
                                $i++;
                            }
                            ?>
                        </tbody> 
                    </table>

                </div>
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



<?php

//Returns the subject list
function subject_list($list, $class_id,$type) {
    $subject_name = '';
    foreach ($list as $record) {
        if (@$record->sc_cls_id == $class_id && $type == 'subject') {
            $subject_name = $subject_name . $record->sc_sub_name . ' , ';
        }else if(@$record->sc_cls_main_class == $class_id && $type == 'section'){
            
             $subject_name = $subject_name . $record->sc_cls_name . ' , ';
        }
    }
    $subject_name = substr($subject_name, 0, -3);
    return $subject_name;
}
?>
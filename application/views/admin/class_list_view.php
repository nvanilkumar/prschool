 <div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="header smaller lighter blue">View Classes</h3>
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered table-hover">                             <thead> 
                                <tr> 
                                    <th class="header">S.No</th> 
                                    <th class="header">Class Name</th> 
                                    <th class="header">Subject Names</th>
                                    <th class="header">Section Names</th> 
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
                                         
                                        <td><?= subject_list($section_lists, $row_data->sc_cls_id,'section') ?> </td> 
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

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->


<script src="<?= CSS_PATH ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= CSS_PATH ?>assets/js/jquery.dataTables.bootstrap.js"></script>

<script type="text/javascript">
    jQuery(function($) {
        var oTable1 = $('#data-table').dataTable({
        });
    });
</script> 

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
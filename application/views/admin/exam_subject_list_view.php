<?php
//Get the first parameter value
$form_name = $this->uri->segment(3);
//Form Labels Preparation
if ($form_name === "subjects") {
    $lables_array = array("pageheader" => "View Subjects",
        "th1" => "Subject Name",
        "th2" => "Subject Description",
        "td1" => "sc_sub_name",
        "td2" => "sc_sub_descryption",
        "td3" => "sc_sub_id",
    );
} else {

    $lables_array = array("pageheader" => "Exam List",
        "th1" => "Exam Name",
        "th2" => "Description",
        "td1" => "sc_exa_name",
        "td2" => "sc_exa_descryption",
        "td3" => "sc_exa_id",
    );
}
?>
<div class="page-content">


    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->



            <div class="row">
                <div class="col-xs-12">
                    <h3 class="header smaller lighter blue"><?= $lables_array["pageheader"]; ?></h3>
                    <div class="table-header">
                        Results for "Subjects"
                    </div>

                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered table-hover"> 
                            <thead> 
                                <tr> 
                                    <th class="header">S.No</th> 
                                    <th class="header"><?= $lables_array["th1"]; ?></th> 
                                    <th class="header"><?= $lables_array["th2"]; ?></th> 
                                    <th class="header">Actions</th> 
                                </tr> 
                            </thead> 
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($lists as $row_data) {
                                    ?>
                                    <tr> 
                                        <td><?= $i ?></td> 
                                        <td><?= $row_data->$lables_array["td1"] ?></td> 
                                        <td><?= $row_data->$lables_array["td2"] ?></td> 
 
                                        <td>
                                            <a class="green" href="<?= BASEURL ?>admin/opertions/<?= $form_name ?>/<?= $row_data->$lables_array["td3"] ?>">
                                                <i class="icon-pencil bigger-130"></i>Edit
                                            </a>


                                        </td> 
                                    </tr>
                                    <?php
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
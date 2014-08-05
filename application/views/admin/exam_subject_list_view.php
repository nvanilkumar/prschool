<?php
//Get the first parameter value
$form_name = $this->uri->segment(3);
//Form Labels Preparation
if ($form_name === "subjects") {
    $lables_array = array("pageheader" => "Subjects List",
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
<!-- begin page-header -->
<h1 class="page-header"><?= $lables_array["pageheader"]; ?> </h1>
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
                                        <a href="<?= BASEURL ?>admin/opertions/<?= $form_name ?>/<?= $row_data->$lables_array["td3"] ?>" class="btn btn-primary btn-xs m-r-5">Edit</a>

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
        <!-- end panel -->
    </div>
    <!-- end col-12 -->
</div>
<!-- end row --> 
<link href="<?= PLUGIN_PATH ?>DataTables-1.9.4/css/data-table.css" rel="stylesheet" />
<script src="<?= PLUGIN_PATH ?>DataTables-1.9.4/js/jquery.dataTables.js"></script>
<script src="<?= PLUGIN_PATH ?>DataTables-1.9.4/js/data-table.js"></script>


<script type="text/javascript"  src="<?= JS_PATH ?>jquery.validate.js"></script>

<link rel="stylesheet" href="<?= JS_PATH ?>autocomplete/themes/base/jquery.ui.all.css">
<!-- Auto complete plugin files -->
<script src="<?= JS_PATH ?>autocomplete/ui/jquery.ui.core.js"></script>
<script src="<?= JS_PATH ?>autocomplete/ui/jquery.ui.widget.js"></script>
<script src="<?= JS_PATH ?>autocomplete/ui/jquery.ui.position.js"></script>
<script src="<?= JS_PATH ?>autocomplete/ui/jquery.ui.menu.js"></script>
<script src="<?= JS_PATH ?>autocomplete/ui/jquery.ui.autocomplete.js"></script>
<script src="<?= JS_PATH ?>autocomplete/ui/jquery.ui.datepicker.js"></script>
<?php
    $datepickerstart=($this->input->post('datepickerstart'))?$this->input->post('datepickerstart'): old_date(60);
    $datepickerend=($this->input->post('datepickerend'))?$this->input->post('datepickerend'):todaydate();
    
    
?>  
<script>
    var datepickerstart ='<?=$datepickerstart?>',
        datepickerend='<?=$datepickerend?>';
</script>    

<script type="text/javascript"  src="<?= JS_PATH ?>courier_entry_reports.js"></script>

<section id="main" class="column">
    <?php if (strlen($status_message) > 0) { ?>
        <h4 class="alert_success">Success fully edited the courier details </h4>
    <?php } ?>

    <form action="" name="courier_entry_reports_form" id="courier_form" method="post">
        <article class="module width_full">
            <header>
                <h3 class="tabs_involved">Reports  form</h3>
            </header>
            <div class="tab_container"></div>
            <fieldset class="lefttxbox">
                <label>Date Range</label>
                <input type="text" name="datepickerstart" class="date_range" id="datepickerstart" value="">
                <label>to</label>
                <input type="text" name="datepickerend" class="date_range" id="datepickerend" value="">
                <span   ></span>
            </fieldset>

            <fieldset class="lefttxbox">
                <label>Search customer by name/ client code</label>
                <input type="text" name="search_text" id="search_text" value="">
                <span > </span>
            </fieldset>
            <fieldset class="righttxbox1">
                Invode 

                <input type="checkbox" name="c_type[]"  value="invode"> <br/>
                Outvode

                <input type="checkbox" name="c_type[]" value="outvode" >
                <span   ></span>
            </fieldset>

            <input type="hidden" value="reports_form" name="type" />
            <input type="hidden" value="" name="client_id"  id="client_id" />



            <div class="submit_btn">
                <input type="submit" value="Submit" name="submit" class="alt_btn">
            </div>
            <div class="clear"></div>



        </article>

    </form>


    <div class="spacer"></div>
    
    <article class="module width_full">
        <header><h3 class="tabs_involved">Organizations List</h3> </header>
        <div class="tab_container">
            <div id="tab1" class="tab_content" style="display: block;">
                <table class="tablesorter" cellspacing="0"> 
                    <thead> 
                        <tr> 
                             
                            <th class="header">Date</th> 
                            <th class="header">Customer Details</th> 
                            <th class="header">Courier Name</th> 
                            <th class="header">Details</th> 
                            <th class="header">Type</th> 
                           
                        </tr> 
                    </thead> 
                    <tbody>
                        <?php foreach($reoprts as $report_data) { ?>
                        <tr> 
                            <td><?=format_date($report_data->cou_ent_created_date)  ?> </td> 
                            <td><?= $report_data->cus_first_name ?></td> 
                            <td><?= $report_data->cou_ser_name ?></td> 
                            <td><?= $report_data->cou_ent_registration_num .'<br/>'. $report_data->cou_ent_description ?></td>  
                            <td> <?= $report_data->cou_ent_type ?> </td> 
                        </tr>
                        <?php } ?>
                    </tbody> 
                </table>
            </div><!-- end of #tab1 -->



        </div><!-- end of .tab_container -->

    </article>
</section>

 
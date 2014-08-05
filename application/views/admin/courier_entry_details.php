
<script type="text/javascript"  src="<?= JS_PATH ?>jquery.validate.js"></script>

<link rel="stylesheet" href="<?=JS_PATH?>autocomplete/themes/base/jquery.ui.all.css">
    
   
	<script src="<?=JS_PATH?>autocomplete/ui/jquery.ui.core.js"></script>
	<script src="<?=JS_PATH?>autocomplete/ui/jquery.ui.widget.js"></script>
	<script src="<?=JS_PATH?>autocomplete/ui/jquery.ui.position.js"></script>
	<script src="<?=JS_PATH?>autocomplete/ui/jquery.ui.menu.js"></script>
	<script src="<?=JS_PATH?>autocomplete/ui/jquery.ui.autocomplete.js"></script>
	 

<script type="text/javascript"  src="<?= JS_PATH ?>courier_entry.js"></script>

<section id="main" class="column">
    <?php if (strlen($status_message) > 0) { ?>
        <h4 class="alert_success">Success fully edited the courier details </h4>
    <?php } ?>

    <form action="" name="courier_entry_form" id="courier_form" method="post">
        <article class="module width_full">
            <header>
                <h3 class="tabs_involved">Entry form</h3>
            </header>
            <div class="tab_container"></div>
            <fieldset class="lefttxbox">
                <label>Search customer by name/ client code</label>
                <input type="text" name="search_text" id="search_text" value="">
                <span > </span>
            </fieldset>

            <fieldset style="width:48%; float:left;">
                <label>Address</label>
                <textarea rows="7" style="width:93%;" name="customer_details" id="customer_details"></textarea>
                <span   ></span>
            </fieldset>
            <fieldset class="lefttxbox">
                <label>Select Courier Service</label>
                <select name="cou_ent_courier_id" id="cou_ent_courier_id" >
                    <option value="">Select courier</option>
                <?php foreach($courier_list as $list){ ?> 
                     <option value="<?=$list->cou_ser_id?> "><?= $list->cou_ser_name?></option>
                <?php }?>    

                </select>
            </fieldset>

            <fieldset class="righttxbox1">
                <label>Courier Registration Number </label>
                <input type="text" name="cou_ent_registration_num" id="cou_ent_registration_num" value="<?= (strlen($cou_details->cou_ser_phone_no) > 0) ? $cou_details->cou_ser_phone_no : ''; ?>">
                <span   ></span>
            </fieldset>

            <fieldset style="width:48%; float:left;">
                <label>Courier Description</label>
                <textarea rows="7" style="width:93%;" name="cou_ent_description" id="cou_ent_description"></textarea>
                <span   ></span>
            </fieldset>
            <input type="hidden" value="<?= ($form_type == 'Add') ? 'Add' : 'Edit'; ?>" name="type" />
            <input type="hidden" value="" name="cou_ent_client_id" id="cou_ent_client_id" />



            <div class="submit_btn">
                <input type="submit" value="Submit" name="submit" class="alt_btn">
            </div>
            <div class="clear"></div>

        </article>

    </form>


    <div class="spacer"></div>
</section>
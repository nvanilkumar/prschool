<script type="text/javascript"  src="<?=JS_PATH?>jquery.validate.js"></script>
<script type="text/javascript"  src="<?=JS_PATH?>customer_details.js"></script>

<section id="main" class="column">
    <?php if(strlen($status_message) > 0) { ?>
        <h4 class="alert_success">Success fully edited the customer details </h4>
    <?php } ?>

   <form action="" name="customer_form" id="customer_form" method="post">
    <article class="module width_full">
        <header>
            <h3 class="tabs_involved">Add Customer Information</h3>
        </header>
        <div class="tab_container"></div>
        <fieldset class="lefttxbox">
            <label>First Name</label>
            <input type="text" name="cus_first_name" id="cus_first_name" value="<?=(strlen($cus_details->cus_first_name) >0) ? $cus_details->cus_first_name:''; ?>">
            <span   ></span>
        </fieldset>
        <fieldset class="righttxbox1">
           <label>Last Name</label>
            <input type="text" name="cus_last_name" id="cus_last_name" value="<?=(strlen($cus_details->cus_first_name) >0)? $cus_details->cus_last_name:''; ?>">
             <span   ></span>
        </fieldset>
        <fieldset class="lefttxbox">
            <label>Client Code</label>
            <input type="text" name="cus_client_id" id="cus_client_id" value="<?=(strlen($cus_details->cus_client_id) >0)? $cus_details->cus_client_id:''; ?>">
             <span   ></span>
        </fieldset>
        <fieldset class="righttxbox1">
           <label>City Code</label>
            <input type="text" name="cus_city_code" id="cus_city_code" value="<?=(strlen($cus_details->cus_city_code) >0)?$cus_details->cus_city_code :''; ?>">
             <span   ></span>
        </fieldset>
        
        <fieldset class="lefttxbox">
            <label>State Code</label>
            <input type="text" name="cust_state_code" id="cust_state_code" value="<?=(strlen($cus_details->cus_state_code) >0)?$cus_details->cus_state_code :''; ?>">
             <span   ></span>
        </fieldset>
        <fieldset class="righttxbox1">
           <label> Pin code </label>
            <input type="text" name="cus_pincode" id="cus_pincode" value="<?=(strlen($cus_details->cus_pincode) >0)?$cus_details->cus_pincode :''; ?>">
            <span   ></span>
        </fieldset>

        <fieldset style="width:48%; float:left;">
            <label>Address</label>
            <textarea rows="7" style="width:93%;" name="cus_address1" id="cus_address1"><?=(strlen($cus_details->cus_address1) >0)? $cus_details->cus_address1:''; ?></textarea>
             <span   ></span>
        </fieldset>
        <input type="hidden" value="<?= ($form_type=='Add')?'Add':'Edit'; ?>" name="type" />
        
        <div class="submit_btn">
            <input type="submit" value="Submit" name="submit" class="alt_btn">
        </div>
        <div class="clear"></div>
   
    </article>

 </form>


    <div class="spacer"></div>
</section>
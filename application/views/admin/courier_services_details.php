<script type="text/javascript"  src="<?= JS_PATH ?>jquery.validate.js"></script>
<script type="text/javascript"  src="<?= JS_PATH ?>courier_services_details.js"></script>

<section id="main" class="column">

    <!-- <h4 class="alert_success">A Success Message</h4> -->

    <form action="" name="courier_form" id="courier_form" method="post">
        <article class="module width_full">
            <header>
                <h3 class="tabs_involved">Courier Entry</h3>
            </header>
            <div class="tab_container"></div>
            <fieldset class="lefttxbox">
                <label>Courier Service Name</label>
                <input type="text" name="cou_ser_name" id="cou_ser_name" value="<?= (strlen($cou_details['cou_ser_name']) > 0) ? $cou_details['cou_ser_name'] : ''; ?>">
                <span > </span>
            </fieldset>

            <fieldset class="righttxbox1">
                <label> Phone Number </label>
                <input type="text" name="cou_ser_phone_no" id="cou_ser_phone_no" value="<?= (strlen($cou_details['cou_ser_phone_no']) > 0) ? $cou_details['cou_ser_phone_no'] : ''; ?>">
                <span   ></span>
            </fieldset>

            <fieldset style="width:48%; float:left;">
                <label>Address</label>
                <textarea rows="7" style="width:93%;" name="cou_ser_address" id="cou_ser_address">
                    <?= (strlen($cou_details['cou_ser_address']) > 0) ? $cou_details['cou_ser_address'] : ''; ?>
                </textarea>
                <span   ></span>
            </fieldset>
            <input type="hidden" value="<?= ($form_type == 'Add') ? 'Add' : 'Edit'; ?>" name="type" />

            <div class="submit_btn">
                <input type="submit" value="Submit" name="submit" class="alt_btn">
            </div>
            <div class="clear"></div>

        </article>

    </form>


    <div class="spacer"></div>
</section>
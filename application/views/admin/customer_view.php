<section id="main" class="column" style="height: 681px;">
    <article class="module width_full">
        <header><h3 class="tabs_involved">Organizations List</h3> </header>
        <div class="tab_container">
            <div id="tab1" class="tab_content" style="display: block;">
                <table class="tablesorter" cellspacing="0"> 
                    <thead> 
                        <tr> 
                            <th class="header"></th> 
                            <th class="header">Client Code</th> 
                            <th class="header">Name</th> 
                            <th class="header">Address</th> 
                            <th class="header">Actions</th> 
                        </tr> 
                    </thead> 
                    <tbody>
                        <?php foreach($lists as $coustmer_data) { ?>
                        <tr> 
                            <td><input type="checkbox"></td> 
                            <td><?= $coustmer_data->cus_client_id ?></td> 
                            <td><?= $coustmer_data->cus_first_name . $coustmer_data->cus_last_name ?></td> 
                            <td><?= $coustmer_data->cus_city_code . '</br>' . $coustmer_data->cus_state_code . '</br>' . $coustmer_data->cus_address1 . '</br>' . $coustmer_data->cus_pincode . '</br>' ?></td>  
                            <td>
                                  <a href="<?=BASEURL?>admin/cusotmer_details/<?=$coustmer_data->cus_id ?>" ><img src="<?=IMAGE_PATH ?>icn_edit.png" title="edit"/></a>
                                
                            </td> 
                        </tr>
                        <?php } ?>
                    </tbody> 
                </table>
            </div><!-- end of #tab1 -->



        </div><!-- end of .tab_container -->

    </article>
    <!-- end of content manager article -->
</section>
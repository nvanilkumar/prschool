<section id="main" class="column" style="height: 681px;">
    <article class="module width_full">
        <header><h3 class="tabs_involved">Courier Services  List</h3> </header>
        <div class="tab_container">
            <div id="tab1" class="tab_content" style="display: block;">
                <table class="tablesorter" cellspacing="0"> 
                    <thead> 
                        <tr> 
                            <th class="header"></th> 
                            <th class="header">Name</th> 
                            <th class="header">Phone Number</th> 
                            <th class="header">Address</th> 
                            <th class="header">Actions</th> 
                        </tr> 
                    </thead> 
                    <tbody>
                        <?php foreach($lists as $courier_data) { ?>
                        <tr> 
                            <td><input type="checkbox"></td> 
                            <td><?= $courier_data->cou_ser_name ?></td> 
                            <td><?= $courier_data->cou_ser_phone_no  ?></td> 
                            <td><?= $courier_data->cou_ser_address ?></td>  
                            <td>
                                <a href="<?=BASEURL?>admin/courier_details/<?=$courier_data->cou_ser_id ?>" ><img src="<?=IMAGE_PATH ?>icn_edit.png" title="edit"/></a>
                               <!--  <a href="cusotmer_details/"<?='' ?>><img src="<?=IMAGE_PATH ?>icn_trash.png" title="Trash"/></a>-->
                        
                            </td> 
                        </tr>
                        <?php } ?>
                    </tbody> 
                </table>
            </div><!-- end of #tab1 -->
        </div><!-- end of .tab_container -->
    </article>
</section>
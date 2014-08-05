<aside id="sidebar" class="column">		 
    <hr/>

    <h3>Admin Features</h3>
    <ul class="toggle">			
        <li class="icn_organization"><?php echo anchor('admin/user_list', 'User List'); ?></li>	
        <li class="icn_edit_article"><a href="javascript:void(0);">Admin User list</a></li>			
    </ul>	
 <h3>Customers Information</h3>
    <ul class="toggle">			
        <li class="icn_add_user"><?php echo anchor('admin/cusotmer_details', 'Add Customer '); ?></li>	
        <li class="icn_view_users"><?php echo anchor('admin/list_details/customers', 'View Customers '); ?></li>			
    </ul>
    <h3>Courier Services</h3>
    <ul class="toggle">			
        <li class="icn_organization"><?php echo anchor('admin/courier_details', 'Add Courier Service'); ?></li>	
        <li class="icn_categories"><?php echo anchor('admin/list_details/courier_list', 'Courier list'); ?></li>			
    </ul>
    <h3>Invode / Outvode</h3>
    <ul class="toggle">			
        <li class="icn_new_article"><?php echo anchor('admin/courier_entry/invode', 'Invode Courier Entry'); ?></li>	
        <li class="icn_new_article"><?php echo anchor('admin/courier_entry/outvode', 'Invode Courier Entry'); ?></li>	
        <li class="icn_categories"><a href="javascript:void(0);">testlink</a></li>			
    </ul>

    <ul></ul>			
    <footer>
        <hr />
        <p><strong>Copyright &copy; 2013 Website Admin</strong></p>

    </footer>
</aside>
<!-- end of sidebar -->
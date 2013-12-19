<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('header.php');
?>

            <!-- module goes here -->
			<!-- Category -->
            <div class="grid_6">
                <!-- Notification boxes -->
                
                <div class="module">
                     <h2><span>Category delete option</span></h2>

                     <div class="module-body">
                        <a name="cat_add"></a>
                        <span class="notification n-success" <?php if($state!='add_ok') echo 'style="display:none;"'; ?>>Added successfully!</span>
                        <p>
                        Choose option for deleting action, be careful !
                        </p>
                        <p>
                            <a href="<?=site_url('admin_category/confirm_delete/cat_id/'.$cat_id.'/delete_post/1/special/'.$special.'/view_mode/'.$view_mode)?>" class="button" ><span>Delete all child posts recursively</span></a>
                        </p>
                        <div style="clear: both; height: 20px;"></div>
                        <p>
                            <a href="<?=site_url('admin_category/confirm_delete/cat_id/'.$cat_id.'/delete_post/0/special/'.$special.'/view_mode/'.$view_mode)?>" class="button" ><span>Delete category only (child posts will be mark as uncategorized)</span></a>
                        </p>
                     </div> <!-- End .module-body -->
                </div> <!-- End .module -->
                <div style="clear:both;"></div>
            </div> <!-- End .grid_6 -->
            
            <div style="clear:both;"></div>
<?php
require_once('footer.php');
?>
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->helper('url');
$template_path=base_url().'application/views/admin/dashboard/';

//load library
$this->load->helper('url');
require_once('header.php');
?>

            <!-- module goes here -->
			<!-- Media -->
            <div class="grid_6">
                <!-- Notification boxes -->
                
                <div class="module">
                     <h2><span>Media function</span></h2>

                     <div class="module-body">
                        <span class="notification n-success" <?php if($state!='validate_ok') echo 'style="display:none;"'; ?>>Validated successfully! (Total files removed = <?php echo $unlink_count?>)</span>  
                        <p>
                        Check and validate media file stored in upload folder.
                        <br />
                        Process will automatically removes unused media.
                        </p>
                        <a href="<?php echo site_url('admin_media/validate'); ?>" class="button"><span>Validate</span></a>
                     </div> <!-- End .module-body -->
                </div> <!-- End .module -->
                <div style="clear:both;"></div>
            </div> <!-- End .grid_6 -->
            <div style="clear:both;"></div>
<?php
require_once('footer.php');
?>
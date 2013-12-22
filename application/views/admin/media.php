<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view($_tpl.'header');
function show_notification($state,$unlink_count)
{
    ?>
    <span class="notification n-success" <?php if(!in_array('validate_ok',$state)) echo 'style="display:none;"'; ?>>Validated successfully! (Total files removed = <?php echo $unlink_count?>)</span>
    <?php
}
?>

            <!-- module goes here -->
			<!-- Media -->
            <div class="grid_6">
                <!-- Notification boxes -->
                
                <div class="module">
                     <h2><span>Media function</span></h2>

                     <div class="module-body">
                        <?=show_notification($state,$unlink_count)?>
                        <p>
                        Check and validate media file stored in upload folder.
                        <br />
                        Process will automatically removes unused media.
                        </p>
                        <a href="<?php echo site_url($_com.'media/validate'); ?>" class="button"><span>Validate</span></a>
                     </div> <!-- End .module-body -->
                </div> <!-- End .module -->
                <div style="clear:both;"></div>
            </div> <!-- End .grid_6 -->
            <div style="clear:both;"></div>
<?php
$this->load->view($_tpl.'footer');
?>
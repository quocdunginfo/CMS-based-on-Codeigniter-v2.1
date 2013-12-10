<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('admin/header');
function show_notification($state)
{
    ?>
    <span class="notification n-success" <?php if(!in_array('edit_ok',$state)) echo 'style="display:none;"'; ?>>Updated successfully!</span>
    <?php
}
?>

            <!-- module goes here -->
			<!-- Media -->
            <div class="grid_6">
                <!-- Notification boxes -->
                
                <div class="module">
                     <h2><span>Template list</span></h2>

                     <div class="module-body">
                        <?=show_notification($state)?>
                        <p>
                        Template List
                        <br />
                        <form action="<?=site_url('admin_template/choose')?>" method="post">
                        <select name="template_id">
                            <?php foreach($template_list as $item) { ?>
                            <option value="<?=$item->id?>" <?php if($template_id==$item->id) echo 'selected="selected"'; ?>><?=$item->get_name()?></option>
                            <?php } ?>
                        </select>
                        <input class="submit-green" type="submit" value="Set website template" style="margin-left: 30px;">
                        </form>
                        </p>
                     </div> <!-- End .module-body -->
                </div> <!-- End .module -->
                <div style="clear:both;"></div>
            </div> <!-- End .grid_6 -->
            <div style="clear:both;"></div>
<?php
$this->load->view('admin/footer');
?>
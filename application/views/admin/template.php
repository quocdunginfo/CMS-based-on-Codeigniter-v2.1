<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view($_tpl.'header');
function show_notification($state)
{
    ?>
    <span class="notification n-success" <?php if(!in_array('edit_ok',$state)) echo 'style="display:none;"'; ?>>Updated successfully!</span>
    <?php
}
?>

            <!-- module goes here -->
			<!-- Media -->
            <div class="grid_12">
                <!-- Notification boxes -->
                <style type="text/css">
                .module-body label{
                    float: left; width: 120px;
                }
                </style>
                <div class="module">
                     <h2><span>Components</span></h2>

                     <div class="module-body">
                        <?=show_notification($state)?>
                        <form action="<?=site_url($_com.'template/choose')?>" method="post">
                        <p>
                            <br />
                            
                            <label>Default Component:</label>
                            <select name="template_id">
                                <?php foreach($template_list as $item) { ?>
                                <option value="<?=$item->id?>" <?php if($s_template_id==$item->id) echo 'selected="selected"'; ?>><?=$item->get_name()?></option>
                                <?php } ?>
                            </select>
                            <br />
                            <br />
                            
                            <label>Front Template:</label>
                            <select name="front_template_id">
                                <?php foreach($template_list as $item) { ?>
                                <option value="<?=$item->id?>" <?php if($s_front_template_id==$item->id) echo 'selected="selected"'; ?>><?=$item->get_name()?></option>
                                <?php } ?>
                            </select>
                            <br />
                            <br />
                            
                            <label>Blog Template:</label>
                            <select name="blog_template_id">
                                <?php foreach($template_list as $item) { ?>
                                <option value="<?=$item->id?>" <?php if($s_blog_template_id==$item->id) echo 'selected="selected"'; ?>><?=$item->get_name()?></option>
                                <?php } ?>
                            </select>
                            <br />
                            <br />
                            
                            <label>Admin Template:</label>
                            <select name="admin_template_id">
                                <?php foreach($template_list as $item) { ?>
                                <option value="<?=$item->id?>" <?php if($s_admin_template_id==$item->id) echo 'selected="selected"'; ?>><?=$item->get_name()?></option>
                                <?php } ?>
                            </select>
                            <br />
                            <br />
                            <label>&nbsp;</label>
                            <input class="submit-green" type="submit" value="Save">
                            
                            
                        </p>
                        
                        </form>
                     </div> <!-- End .module-body -->
                </div> <!-- End .module -->
                <div style="clear:both;"></div>
            </div> <!-- End .grid_6 -->
            <div style="clear:both;"></div>
<?php
$this->load->view($_tpl.'footer');
?>
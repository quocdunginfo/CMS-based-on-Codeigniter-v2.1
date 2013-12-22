<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('header.php');
?>
            <!-- module goes here -->
			<!-- Form elements -->    
            <div class="grid_8">
            
                <div class="module">
                     <h2><span>Form</span></h2>
                        
                     <div class="module-body">
                        <form action="<?php echo site_url($_com.'user/delete')?>" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user0->id; ?>"/>
                            <div>
                                <span class="notification n-success" <?php if($state!='update_ok') echo 'style="display:none;"'; ?>>Updated successfully!</span>
                                <span class="notification n-success" <?php if($state!='add_ok') echo 'style="display:none;"'; ?>>Added successfully!</span>
                                <span class="notification n-success" <?php if($state!='delete_ok') echo 'style="display:none;"'; ?>>Added successfully!</span>
                            </div>
                            
                            <fieldset>
                                Choose user for tranfering:
                                <select class="input-short" name="user_tranfer_id" style="width: 400px;">
                                    <?php
                                    foreach($user_list as $user_obj):
                                    ?>
                                    <option value="<?=$user_obj->id?>"><?=$user_obj->username.' ('.$user_obj->fullname.')'?></option>
                                    <?php endforeach; ?>
                                </select>
                            </fieldset>
                            
                            <fieldset>
                                <a href="<?=site_url($_com.'users')?>" class="button" style="margin-right: 10px;"><span>Back</span></a>
                                <a href="<?=site_url($_com.'users/delete/'.$user0->id)?>" class="button" style="margin-right: 50px;"><span>Reload</span></a>
                                <input class="submit-green" type="submit" value="Submit" /> 
                            </fieldset>
                        </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
            </div>
<?php
require_once('footer.php');
?>
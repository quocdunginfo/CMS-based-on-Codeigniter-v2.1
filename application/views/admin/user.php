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
                        <form action="<?php echo site_url('admin_user/edit')?>" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user0->id; ?>"/>
                            <div>
                                <span class="notification n-success" <?php if($state!='update_ok') echo 'style="display:none;"'; ?>>Updated successfully!</span>
                                <span class="notification n-success" <?php if($state!='add_ok') echo 'style="display:none;"'; ?>>Added successfully!</span>
                            </div>
                            
                            <p>
                                User name:
                                <input type="text" class="input-medium" name="user_username" value="<?php echo $user0->username; ?>"/>
                                <span class="notification-input ni-correct" style="display:none;">This is correct, thanks!</span>
                            </p>
                            
                            <p>
                                Fullname:
                                <input type="text" class="input-medium" name="user_fullname" value="<?php echo $user0->fullname; ?>"/>
                                <span class="notification-input ni-correct" style="display:none;">This is correct, thanks!</span>
                            </p>
                            <p>
                                Email:
                                <input type="text" class="input-medium" name="user_email" value="<?php echo $user0->email; ?>"/>
                                <span class="notification-input ni-correct" style="display:none;">This is correct, thanks!</span>
                            </p>
                            <p>
                                Password:
                                <input type="password" class="input-short" name="user_password" value="<?php echo $user0->password; ?>"/>
                                <span class="notification-input ni-correct" style="display:none;">This is correct, thanks!</span>
                            </p>
                            <p>
                                Confirm password:
                                <input type="password" class="input-short" name="user_repassword" value="<?php echo $user0->password; ?>"/>
                                <span class="notification-input ni-error" <?php if($state!='password_fail') echo 'style="display:none;"'; ?> >Password does not confirm!</span>
                            </p>
                            
                            <fieldset>
                                <legend>Checkbox</legend>
                                <ul>
                                    <li><label><input name="user_active" type="checkbox" value="1" <?php if($user0->active==1) echo 'checked="checked"'; ?> /> Active user</label></li>
                                </ul>
                            </fieldset>
                            
                            
                            <fieldset>
                                User group:
                                <select <?php //if($user->group_id==1) echo 'disabled="disabled"'; ?> class="input-short" name="user_groupid" style="width: 150px;">
                                    <option value="0" <?php if($user0->group_id==0) echo 'selected="selected"'; ?> >Admin</option>
                                    <option value="1" <?php if($user0->group_id==1) echo 'selected="selected"'; ?> >Normal user</option>
                                    <option value="2" <?php if($user0->group_id==2) echo 'selected="selected"'; ?> >Guest user</option>
                                </select>
                            </fieldset>
                            
                            <fieldset>
                                <a href="<?=site_url('admin_users')?>" class="button" style="margin-right: 10px;"><span>Back</span></a>
                                <a href="<?=site_url('admin_user/index/'.$user0->id)?>" class="button" style="margin-right: 50px;"><span>Reload</span></a>
                                <input class="submit-green" type="submit" value="Submit" /> 
                            </fieldset>
                        </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
            </div>
<?php
require_once('footer.php');
?>
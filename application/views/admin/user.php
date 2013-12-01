<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//user0 obj, state array
$this->load->view('admin/header');
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
                                <span class="notification n-success" <?php if(!in_array('edit_ok',$state)) echo 'style="display:none;"'; ?>>Updated successfully!</span>
                                <span class="notification n-success" <?php if(!in_array('add_ok',$state)) echo 'style="display:none;"'; ?>>Added successfully!</span>
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
                                <input type="password" class="input-short" name="user_password" value="<?php echo $user0->get_password(); ?>"/>
                                <span class="notification-input ni-correct" style="display:none;">This is correct, thanks!</span>
                            </p>
                            <p>
                                Confirm password:
                                <input type="password" class="input-short" name="user_repassword" value="<?php echo $user0->get_password(); ?>"/>
                                <span class="notification-input ni-error" <?php if(!in_array('password_fail',$state)) echo 'style="display:none;"'; ?> >Password does not confirm!</span>
                            </p>
                            
                            <fieldset>
                                <legend>Checkbox</legend>
                                <ul>
                                    <li><label><input name="user_active" type="checkbox" value="1" <?php if($user0->active==1) echo 'checked="checked"'; ?> /> Active user</label></li>
                                </ul>
                            </fieldset>
                            
                            
                            <fieldset>
                                User group:
                                <select name="user_groupid">
                                <?php foreach($group_list as $item): ?>
                                <option value="<?=$item->id?>"
                                <?php if($user0->get_group_obj()!=null && $item->id==$user0->get_group_obj()->id) echo 'selected="selected"' ?>
                                ><?=$item->name?></option>
                                <?php endforeach; ?>
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
$this->load->view('admin/footer');
?>
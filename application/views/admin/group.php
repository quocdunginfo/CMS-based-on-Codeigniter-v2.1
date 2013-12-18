<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//group0 obj, state array
$this->load->view('admin/header');
?>
            <!-- module goes here -->
			<!-- Form elements -->    
            <div class="grid_8">
                <style type="text/css">
                    .module-body label{
                        float: left; width: 120px;
                    }
                </style>
                <div class="module">
                     <h2><span>Form</span></h2>
                        
                     <div class="module-body">
                        <form action="<?php echo site_url('admin_group/edit')?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $group0->id; ?>"/>
                            <div>
                                <span class="notification n-success" <?php if(!in_array('edit_ok',$state)) echo 'style="display:none;"'; ?>>Updated successfully!</span>
                                <span class="notification n-success" <?php if(!in_array('add_ok',$state)) echo 'style="display:none;"'; ?>>Added successfully!</span>
                            </div>
                            
                            <p>
                                <label>Group name:</label>
                                <input type="text" class="input-medium" name="name" value="<?php echo $group0->name; ?>"/>
                                <sup style="color: red;">*</sup>
                                <span style="color: red;">
                                    <?php if(in_array('name_fail',$state))
                                    {
                                        echo 'Fail';
                                    }
                                    else if(in_array('name_exist_fail',$state))
                                    {
                                        echo 'Already existed!';
                                    }
                                        
                                    ?>
                                </span>
                            </p>
                            <p>
                                <label>Group description:</label>
                                <input type="text" class="input-medium" name="description" value="<?php echo $group0->description; ?>"/>
                            </p>
                            <p>
                                <label>Permission:</label>
                                <span style=" float: left;">
                                <?php
                                $i=1;
                                foreach($permission_list as $item)
                                {
                                    
                                ?>
                                <input name="checkbox_list[]" type="checkbox" value="<?=$item->id?>" <?php if($group0->is_has_permission($item)) echo 'checked="checked"' ?>/>
                                <?=$item->name?>
                                <br />
                                <?php
                                    if($i%4==0)
                                    {
                                        echo '<br>';
                                    }
                                    $i++;
                                }
                                ?>
                                </span>
                            </p>
                            <div style="clear: both;"></div>
                            <br />
                            <fieldset>
                                <a href="<?=site_url('admin_groups/index/')?>" class="button" style="margin-right: 10px;"><span>Back</span></a>
                                <a href="<?=site_url('admin_groups/edit/'.$group0->id)?>" class="button" style="margin-right: 50px;"><span>Reload</span></a>
                                <input class="submit-green" type="submit" value="Submit" /> 
                            </fieldset>
                        </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
            </div>
<?php
$this->load->view('admin/footer');
?>
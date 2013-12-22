<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view($_tpl.'header');
?>
            <!-- module goes here -->
			<!-- Form elements -->    
            <div class="grid_8">
            
                <div class="module">
                     <h2><span>Form</span></h2>
                        
                     <div class="module-body">
                        <form action="<?php echo site_url($_com.'user/delete/special/'.$user0->special)?>" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user0->id; ?>"/>

                            <fieldset>
                                Choose user for tranfering:
                                <select class="input-short" name="user_transfer_id" style="width: 400px;">
                                    <?php
                                    foreach($user_list as $user_obj):
                                    ?>
                                    <option value="<?=$user_obj->id?>"><?=$user_obj->username.' ('.$user_obj->fullname.')'?></option>
                                    <?php endforeach; ?>
                                </select>
                            </fieldset>
                            
                            <fieldset>
                                <a href="<?=site_url($_com.'users/index/special/'.$user0->special)?>" class="button" style="margin-right: 10px;"><span>Back</span></a>
                                <a href="<?=site_url($_com.'users/delete/id/'.$user0->id.'/special/'.$user0->special)?>" class="button" style="margin-right: 50px;"><span>Reload</span></a>
                                <input class="submit-green" type="submit" value="Submit" /> 
                            </fieldset>
                        </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
            </div>
<?php
$this->load->view($_tpl.'footer');
?>
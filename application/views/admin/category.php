<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('admin/header');
?>

            <!-- module goes here -->
			<!-- Category -->
            <div class="grid_6">
                <!-- Notification boxes -->
                
                <div class="module">
                     <h2><span>Category function</span></h2>

                     <div class="module-body">
                        <a name="cat_add"></a>
                        <span class="notification n-success" <?php if(!in_array('add_ok',$state)) echo 'style="display:none;"'; ?>>Added successfully!</span>
                        <p>
                        Choose parent category:
                        </p>
                          
                        <form action="<?php echo site_url('admin_category/add/'.$special); ?>" method="post">
                            <fieldset>
                                <ul class="qdClass" style="border:2px solid #ccc; width:80%px; height: 350px; overflow-y: scroll; padding:10px 10px 10px 10px;">
                                    <li>
                                        <label>
                                            <input checked="checked" type="radio" name="cat_radio_list[]" value="-1"/>
                                            [Root category]
                                        </label>
                                    </li>
                                    <?php
                                    
                                    foreach($cat_list as $cat_obj):
                                
                                    ?>
                                    
                                    <li>
                                        <label>
                                            
                                            <input id="cat_id_<?=$cat_obj->id?>" style="margin-left:<?php echo ($cat_obj->level+1)*20; ?>px;" type="radio" name="cat_radio_list[]" value="<?php echo $cat_obj->id; ?>"/>
                                            &nbsp;
                                            <span id="cat_name_<?=$cat_obj->id?>"><?php echo $cat_obj->name; ?></span>
                                            <a onclick="return confirm_click();" href="<?php echo site_url('admin_category/delete/'.$cat_obj->id.'/'.$special); ?>" style="float: right;">Delete</a>
                                            
                                            <a href="javascript:transfer_cat_edit(<?=$cat_obj->id?>);" style="float: right; margin-right: 20px;" >Edit</a>
                                            
                                        </label>
                                    </li>
                                    <?php
                                    endforeach;
                                    ?>
                                    <script language="javascript">
                                        function confirm_click() {
                                            if (confirm("Are you sure to do this task ?")) {
                                                return true;
                                            } else {
                                                return false;
                                            }
                                        }
                                        function transfer_cat_edit(cat_id)
                                        {
                                            var new_name = $('#cat_name_'+cat_id).text();
                                            $('#cat_edit_id').attr("value",cat_id);
                                            $('#cat_edit_name').attr("value",new_name);
                                            //auto select radio
                                            $('#cat_id_'+cat_id).attr('checked','checked');
                                            //move to edit area
                                            window.location.hash="cat_edit";
                                        }
                                    </script>
                                </ul>
                            </fieldset>
                            
                            <fieldset>
                                Category name:
                                <input name="cat_name" type="text" class="input-short" style="width: 200px;"/>
                                &nbsp;
                                <input class="submit-green" type="submit" value="Add category" />
                                <a name="cat_add"></a>
                            </fieldset>
                        </form>

                        <!-- <a href="<?php echo site_url('admin_media/validate'); ?>"><input class="submit-green" value="Validate" style="width:100px; text-align:center;" onclick="javascript:cat_item_click(this)"></a> -->
                     </div> <!-- End .module-body -->
                </div> <!-- End .module -->
                <div style="clear:both;"></div>
            </div> <!-- End .grid_6 -->
            
            <!-- Category edit panel -->
            <div class="grid_6">
                <!-- Notification boxes -->
                
                <div class="module">
                     <h2><span>Category function</span></h2>

                     <div class="module-body">
                        <span class="notification n-success" <?php if(!in_array('edit_ok',$state)) echo 'style="display:none;"'; ?>>Updated successfully!</span>
                        <p>Edit category</p>  
                        <form action="<?php echo site_url('admin_category/edit/'.$special); ?>" method="post">
                            <fieldset>
                                Category name:
                                <input id="cat_edit_id" name="cat_id" type="hidden" value=""/>
                                <input id="cat_edit_name" value="" name="cat_name" type="text" class="input-short" style="width: 200px;"/>
                                &nbsp;
                                <input class="submit-green" type="submit" value="Submit" />
                                <a name="cat_edit"></a>
                            </fieldset>
                        </form>

                        
                     </div> <!-- End .module-body -->
                </div> <!-- End .module -->
                <div style="clear:both;"></div>
            </div> <!-- End .grid_6 -->
            <div style="clear:both;"></div>
<?php
$this->load->view('admin/footer');
?>
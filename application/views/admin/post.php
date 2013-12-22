<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('admin/header');
?>
            <!-- module goes here -->
			<!-- Form elements -->    
            <div class="grid_8">
            
                <div class="module">
                     <h2><span>Post properties</span></h2>
                        
                     <div class="module-body">
                        <form action="<?php echo site_url($_com.'post/edit/'.$special)?>" method="post">
                            <input type="hidden" name="post_id" value="<?php echo $post->id; ?>"/>
                            <div>
                                <span class="notification n-success" <?php if($state!='update_ok') echo 'style="display:none;"'; ?>>Updated successfully!</span>
                                <span class="notification n-success" <?php if($state!='add_ok') echo 'style="display:none;"'; ?>>Added successfully!</span>
                                <span class="notification n-success" <?php if($state!='clone_ok') echo 'style="display:none;"'; ?>>Cloned successfully!</span>
                            </div>
                            
                            <p>
                                <label>Title</label>
                                <input type="text" class="input-medium" name="post_title" value="<?php echo $post->title; ?>"/>
                                <span class="notification-input ni-correct" style="display:none;">This is correct, thanks!</span>
                            </p>
                            
                            <p>
                                <label>Avatar</label>
                                <p>
                                    <input id="avatar" type="text" name="avatar" class="input-medium" value="<?=$post->get_avatar()?>" readonly="readonly"/>
                                    <a href="javascript:open_popup('<?=base_url()?>application/_static/filemanager/dialog.php?type=1&editor=mce_0&lang=eng&fldr=&popup=1&field_id=avatar')" class="btn iframe-btn" type="button">Choose</a>
                                    <script>
                                        function open_popup(url)
                                        {
                                                var w = 900;
                                                var h = 600;
                                                var l = Math.floor((screen.width-w)/2);
                                                var t = Math.floor((screen.height-h)/2);
                                                var win = window.open(url, 'Filemanager4tinyMCE', "width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
                                        }
                                    
                                    </script>
                                </p>
                            </p>
                            
                            
                            <p>
                                <label>Short description</label>
                                <textarea name="post_content_lite" rows="5" cols="180" class="input-medium"><?php echo $post->content_lite; ?></textarea>
                            </p>
                            <fieldset>
                                <legend>Checkbox</legend>
                                <ul>
                                    <li><label><input name="post_active" type="checkbox" value="1" <?php if($post->active==1) echo 'checked="checked"'; ?> id="cb11" /> Active post</label></li>
                                </ul>
                            </fieldset>
                            
                            <fieldset>
                                <legend>Category</legend>
                                <ul class="qdClass" style="border:2px solid #ccc; width:48%; height: 200px; overflow-y: scroll; padding:10px 10px 10px 10px;">
                                    <?php
                                    foreach($cat_list as $cat_obj):
                                    ?>
                                    <li><label><input style="margin-left:<?php echo $cat_obj->level*20; ?>px;" <?php if($cat_obj->is_contain_post($post->id)) echo 'checked="checked"'; ?> type="checkbox" name="cat_checkbox_list[]" value="<?php echo $cat_obj->id; ?>"/>&nbsp;&nbsp;<?php echo $cat_obj->name; ?></label></li>
                                    <?php
                                    endforeach;
                                    ?>
                                    
                                </ul>
                            </fieldset>

                            <fieldset>
                                <label>Main content</label>
                                <textarea name="post_content" id="wysiwyg" rows="11" cols="90"><?php echo $post->content; ?></textarea> 
                            </fieldset>
                            
                            <fieldset>
                                <a href="<?=site_url($_com.'posts/index/special/'.$special.'/cat_id/'.$cat_id.'/') ?>" class="button" style="margin-right: 10px;"><span>Back</span></a>
                                <a href="<?=site_url($_com.'post/index/post_id/'.$post->id.'/special/'.$special.'/cat_id/'.$cat_id) ?>" class="button" style="margin-right: 50px;"><span>Reload</span></a>
                                <input class="submit-green" type="submit" value="Submit" /> 
                            </fieldset>
                        </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
            </div>
            <!-- module goes here -->
			<!-- Form elements -->
            <div class="grid_4">
            
                <div class="module">
                    <h2><span>Post's tools</span></h2>
                    
                    <div class="module-body">
                    <p>
                        <label>(renew post: action will delete current post and clone a new one)</label>
                        <a onclick="return confirm_click();" class="button" href="<?=site_url($_com.'post/clone_to_top/'.$post->id)?>"><span>Move post to top</span></a>                            
                    </p>
                    </div> <!-- End .module-body -->
                    <script language="javascript">
                        function confirm_click() {
                            if (confirm("Are you sure to do this task ?")) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    </script>
                </div>  <!-- End .module -->
            </div>
<?php
$this->load->view('admin/footer');
?>
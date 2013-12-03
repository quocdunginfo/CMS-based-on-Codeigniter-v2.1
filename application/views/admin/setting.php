<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('admin/header');
?>
<?php
function show_notification($state=array(),$unlink_count=0)
{
    ?>
    <span class="notification n-success" <?php if(!in_array('delete_cache_ok',$state)) echo 'style="display:none;"'; ?>>Caches deleted successfully! (Total pages removed = <?php echo $unlink_count; ?>)</span>
    <span class="notification n-success" <?php if(!in_array('edit_ok',$state)) echo 'style="display:none;"'; ?>>Updated successfully!</span>
    <?php
}
?> 

            <!-- module goes here -->
			<form action="<?php echo site_url('admin_setting/edit'); ?>" method="post" >
                <!-- System Setting -->
                <div class="grid_6">
                    <!-- Notification boxes -->
                    
                    <div class="module">
                         <h2><span>System option</span></h2>
    
                         <div class="module-body">
                            <?=show_notification($state,$unlink_count)?>  
                            <p>
                                Delete caches to refesh all your web pages
                                <br />
                                Process will automatically remove all files under /application/cache folder.
                            </p>
                            <a href="<?php echo site_url('admin_setting/delete_cache'); ?>" class="button"><span>Delete caches</span></a>
                            
                            <br />
                            <br />
                            
                            <p>
                                    <label>Cache time</label>
                                    <input style="width: 40px;" type="text" class="input-short" name="cache_time" value="<?php echo $cache_time; ?>"/>&nbsp;(minutes) - set to 0 will deactivate cache system
                                    
                            </p>
                            <p>
                                    <label>Maintain mode</label>
                                    <select name="maintain_mode" class="input-short" style="width: 70px;">
                                        <option value="0" <?php if($maintain_mode==0) echo 'selected="selected"'?>>OFF</option>
                                        <option value="1" <?php if($maintain_mode==1) echo 'selected="selected"'?>>ON</option>
                                    </select> (website will be in shutdown state until OFF mode activated)
                                    
                            </p>
                            
                            <input class="submit-green" type="submit" value="Save"  />
                         </div> <!-- End .module-body -->
                    </div> <!-- End .module -->
                    <div style="clear:both;"></div>
                </div> <!-- End .grid_6 -->
                
                
                <!-- Menu Setting -->
                <div class="grid_6">
                    <!-- Notification boxes -->
                    
                    <div class="module">
                         <h2><span>Special options</span></h2>
    
                         <div class="module-body">
                            <?=show_notification($state,$unlink_count)?>  
                            <p>
                                <label>Choose user's feedback category</label>
                                <select class="input-long" name="feedback_category">
                                    <?php
                                        foreach($cat_list_special as $cat_obj):
                                    ?>
                                    <option value="<?=$cat_obj->id?>" <?php if($feedback_category==$cat_obj->id) echo 'selected="selected"'; ?>><?php for($i=1;$i<=$cat_obj->level;$i++) { echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; } echo $cat_obj->name; ?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </p>
                            <p>
                                <label>Allow guest to send feedback via "Contact" page on menu</label>
                                <select name="allow_guest_post_feedback" class="input-short" style="width: 70px;">
                                    <option value="0" <?php if($allow_guest_post_feedback==0) echo 'selected="selected"'?>>OFF</option>
                                    <option value="1" <?php if($allow_guest_post_feedback==1) echo 'selected="selected"'?>>ON</option>
                                </select>
                                    
                            </p>
                            <p>
                                <label>Require guest to type CAPTCHA code when sending feedback (avoid SPAM)</label>
                                <select name="feedback_captcha" class="input-short" style="width: 70px;">
                                    <option value="0" <?php if($feedback_captcha==0) echo 'selected="selected"'?>>OFF</option>
                                    <option value="1" <?php if($feedback_captcha==1) echo 'selected="selected"'?>>ON</option>
                                </select>
                                    
                            </p>
                            <input class="submit-green" type="submit" value="Save"  />
                         </div> <!-- End .module-body -->
                    </div> <!-- End .module -->
                    <div style="clear:both;"></div>
                </div> <!-- End .grid_6 -->
                <div style="clear:both;"></div>
                
                <!-- Widget -->
                <div class="grid_6">
                    <div class="module">
                         <h2><span>Widget</span></h2>
                        
                         <div class="module-body">
                            <?=show_notification($state,$unlink_count)?>  
                            
                            <p>
                                <label>Choose homepage's widgets category</label>
                                <select class="input-long" name="homepage_widget_category">
                                    <?php
                                        foreach($cat_list_special as $cat_obj):
                                    ?>
                                    <option value="<?=$cat_obj->id?>" <?php if($homepage_widget_category==$cat_obj->id) echo 'selected="selected"'; ?>><?php for($i=1;$i<=$cat_obj->level;$i++) { echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; } echo $cat_obj->name; ?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </p>
                            <p>
                                <label>Choose homepage's footer widgets category</label>
                                <select class="input-long" name="homepage_footer_widget_category">
                                    <?php
                                        foreach($cat_list_special as $cat_obj):
                                    ?>
                                    <option value="<?=$cat_obj->id?>" <?php if($homepage_footer_widget_category==$cat_obj->id) echo 'selected="selected"'; ?>><?php for($i=1;$i<=$cat_obj->level;$i++) { echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; } echo $cat_obj->name; ?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </p>
                            <input class="submit-green" type="submit" value="Save"  />
                         </div> <!-- End .module-body -->
                    </div> <!-- End .module -->
                    <div style="clear:both;"></div>
                </div> <!-- End .grid_6 -->
                
                
                <!-- Website's elements Setting -->
                <div class="grid_6">
                    <div class="module">
                         <h2><span>Website's elements</span></h2>
    
                         <div class="module-body">
                            <?=show_notification($state,$unlink_count)?>  
                            
                            <p>
                                <label>- Website title</label>
                                <input style="width: 100%;" class="input-medium" type="text" name="html_title" value="<?=$html['title']?>"/> 
                            </p>
                            <p>
                                <label>- Website left footer</label>
                                Copyright &COPY; [year] <input class="input-medium" type="text" name="html_footer_left" value="<?=$html['footer_left']?>"/> 
                            </p>
                            <p>
                                <label>- Website right footer</label>
                                <input style="width: 100%;" class="input-medium" type="text" name="html_footer_right" value="<?=$html['footer_right']?>"/> 
                            </p>
                            <p>
                                <label>- Website SEO meta author (READ ONLY)</label>
                                <input style="width: 100%;" class="input-medium" type="text" name="html_seo_author" value="<?=$html['seo_author']?>" readonly="readonly"/> 
                            </p>
                            <p>
                                <label>- Website SEO meta keywords</label>
                                <input style="width: 100%;" class="input-medium" type="text" name="html_seo_keyword" value="<?=$html['seo_keyword']?>"/> 
                            </p>
                            <p>
                                <label>- Website SEO meta description</label>
                                <input style="width: 100%;" class="input-medium" type="text" name="html_seo_description" value="<?=$html['seo_description']?>"/> 
                            </p>
                            
                            <input class="submit-green" type="submit" value="Save"  />
                         </div> <!-- End .module-body -->
                    </div> <!-- End .module -->
                    <div style="clear:both;"></div>
                </div> <!-- End .grid_6 -->
                <div style="clear:both;"></div>
                
                <!-- Slider Setting -->
                <div class="grid_6">                    
                    <div class="module">
                         <h2><span>Images slider</span></h2>
    
                         <div class="module-body">
                            <?=show_notification($state,$unlink_count)?>          
                            <p>
                                <label>Choose slider category</label>
                                <select class="input-long" name="slider_category">
                                    <?php
                                        foreach($cat_list_special as $cat_obj):
                                    ?>
                                    <option value="<?=$cat_obj->id?>" <?php if($slider_category==$cat_obj->id) echo 'selected="selected"'; ?>><?php for($i=1;$i<=$cat_obj->level;$i++) { echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; } echo $cat_obj->name; ?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </p>
                            <p>
                                    <label>Slider auto scroll time</label>
                                    <input style="width: 40px;" type="text" class="input-short" name="slider_auto_scroll_time" value="<?php echo $slider_auto_scroll_time; ?>"/>&nbsp;(seconds) - set to 0 will deactivate auto scroll
                            </p>
                            <input class="submit-green" type="submit" value="Save"  />
                         </div> <!-- End .module-body -->
                    </div> <!-- End .module -->
                    <div style="clear:both;"></div>
                </div> <!-- End .grid_6 -->
                
                
                <!-- Menu Setting -->
                <div class="grid_6">
                    <div class="module">
                         <h2><span>Menu and pages</span></h2>
    
                         <div class="module-body">
                            <?=show_notification($state,$unlink_count)?>  
                            
                            <p>
                                <label>Choose category for "Latest posts" menu on home page</label>
                                <select class="input-long" name="menu_latest_category">
                                    <option value="-1" <?php if($menu_latest_category==-1) echo 'selected="selected"'; ?>>(Tất cả)</option>
                                    <?php
                                        foreach($cat_list_normal as $cat_obj):
                                    ?>
                                    <option value="<?=$cat_obj->id?>" <?php if($menu_latest_category==$cat_obj->id) echo 'selected="selected"'; ?>><?php for($i=1;$i<=$cat_obj->level;$i++) { echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; } echo $cat_obj->name.' ('.$cat_obj->count_post_recursive(-1,$cat_obj->special).')'; ?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </p>
                            <p>
                                <label>Choose category for "Categories" menu on home page</label>
                                <select class="input-long" name="menu_categories_category">
                                    <option value="-1" <?php if($menu_categories_category==-1) echo 'selected="selected"'; ?>>(Tất cả)</option>
                                    <?php
                                        foreach($cat_list_normal as $cat_obj):
                                    ?>
                                    <option value="<?=$cat_obj->id?>" <?php if($menu_categories_category==$cat_obj->id) echo 'selected="selected"'; ?>><?php for($i=1;$i<=$cat_obj->level;$i++) { echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; } echo $cat_obj->name.' ('.$cat_obj->count_post_recursive(-1,$cat_obj->special).')'; ?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </p>
                            <p>
                                <label>Choose category for "About" menu on home page</label>
                                <select class="input-long" name="menu_about_category">
                                    <option value="-1" <?php if($menu_about_category==-1) echo 'selected="selected"'; ?>>(Tất cả)</option>
                                    <?php
                                        foreach($cat_list_special as $cat_obj):
                                    ?>
                                    <option value="<?=$cat_obj->id?>" <?php if($menu_about_category==$cat_obj->id) echo 'selected="selected"'; ?>><?php for($i=1;$i<=$cat_obj->level;$i++) { echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; } echo $cat_obj->name.' ('.$cat_obj->count_post_recursive(-1,$cat_obj->special).')'; ?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </p>
                            <input class="submit-green" type="submit" value="Save"  />
                         </div> <!-- End .module-body -->
                    </div> <!-- End .module -->
                    <div style="clear:both;"></div>
                </div> <!-- End .grid_6 -->
                <div style="clear:both;"></div>
                
                <!-- Widget -->
                <div class="grid_6">
                    <div class="module">
                         <h2><span>Posts and Pagination</span></h2>
    
                         <div class="module-body">
                            <?=show_notification($state,$unlink_count)?> 
                            
                            <p>
                                <label>Choose posts per page</label>
                                <input name="maximum_item_per_page" value="<?=$maximum_item_per_page?>" class="input-medium" style="width: 100px;"/>
                            </p>
                            <p>
                                <label>Choose maximum characters for post's title preview</label>
                                <input name="maximum_preview_post_title" value="<?=$maximum_preview_post_title?>" class="input-medium" style="width: 100px;"/>
                            </p>
                            <p>
                                <label>Choose maximum characters for post's content preview</label>
                                <input name="maximum_preview_post_content" value="<?=$maximum_preview_post_content?>" class="input-medium" style="width: 100px;"/>
                            </p>
                            <input class="submit-green" type="submit" value="Save"  />
                         </div> <!-- End .module-body -->
                    </div> <!-- End .module -->
                    <div style="clear:both;"></div>
                </div> <!-- End .grid_6 -->
                
                
            </form>           
<?php
$this->load->view('admin/footer');
?>
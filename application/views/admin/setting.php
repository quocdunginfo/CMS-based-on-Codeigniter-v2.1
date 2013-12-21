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
                                    <input style="width: 40px;" type="text" class="input-short" name="cache_time" value="<?php echo $s_cache_time; ?>"/>&nbsp;(minutes) - set to 0 will deactivate cache system
                                    
                            </p>
                            <p>
                                    <label>Maintain mode</label>
                                    <select name="maintain_mode" class="input-short" style="width: 70px;">
                                        <option value="0" <?php if($s_maintain_mode==0) echo 'selected="selected"'?>>OFF</option>
                                        <option value="1" <?php if($s_maintain_mode==1) echo 'selected="selected"'?>>ON</option>
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
                                    <option value="<?=$cat_obj->id?>" <?php if($s_feedback_category==$cat_obj->id) echo 'selected="selected"'; ?>><?php for($i=1;$i<=$cat_obj->level;$i++) { echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; } echo $cat_obj->name; ?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </p>
                            
                            <p>
                                <label>Require guest to type CAPTCHA code when sending feedback (avoid SPAM)</label>
                                <select name="feedback_captcha" class="input-short" style="width: 70px;">
                                    <option value="0" <?php if($s_feedback_captcha==0) echo 'selected="selected"'?>>OFF</option>
                                    <option value="1" <?php if($s_feedback_captcha==1) echo 'selected="selected"'?>>ON</option>
                                </select>
                                    
                            </p>
                            <input class="submit-green" type="submit" value="Save"  />
                         </div> <!-- End .module-body -->
                    </div> <!-- End .module -->
                    <div style="clear:both;"></div>
                </div> <!-- End .grid_6 -->
                <div style="clear:both;"></div>
                
                <div class="grid_6">
                    <div class="module">
                         <h2><span>Email provider</span></h2>
    
                         <div class="module-body">
                            <?=show_notification($state,$unlink_count)?> 
                            
                            <p>
                                <label>Email protocol (support SMTP only):</label>
                                <input name="email_protocol" value="<?=$s_email_protocol?>" class="input-medium" style="width: 50%;"/>
                            </p>
                            <p>
                                <label>SMTP Host:</label>
                                <input name="email_smtp_host" value="<?=$s_email_smtp_host?>" class="input-medium" style="width: 50%;"/>
                            </p>
                            <p>
                                <label>SMTP Port:</label>
                                <input name="email_smtp_port" value="<?=$s_email_smtp_port?>" class="input-medium" style="width: 20%;"/>
                            </p>
                            <p>
                                <label>SMTP User:</label>
                                <input name="email_smtp_user" value="<?=$s_email_smtp_user?>" class="input-medium" style="width: 50%;"/>
                            </p>
                            <p>
                                <label>SMTP Pass:</label>
                                <input name="email_smtp_pass" value="<?=$s_email_smtp_pass?>" class="input-medium" style="width: 50%;"/>
                            </p>
                            <p>
                                <label>Send Timeout (s):</label>
                                <input name="email_timeout" value="<?=$s_email_timeout?>" class="input-medium" style="width: 20%;"/>
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
                                <input style="width: 100%;" class="input-medium" type="text" name="html_title" value="<?=$s_html_title?>"/> 
                            </p>
                            <p>
                                <label>- Template logo text</label>
                                <input style="width: 100%;" class="input-medium" type="text" name="html_logo_name" value="<?=$s_html_logo_name?>"/> 
                            </p>
                            <p>
                                <label>- Website left footer</label>
                                <input style="width: 100%;" class="input-medium" type="text" name="html_footer_left" value="<?=$s_html_footer_left?>"/> 
                            </p>
                            <p>
                                <label>- Website right footer</label>
                                <input style="width: 100%;" class="input-medium" type="text" name="html_footer_right" value="<?=$s_html_footer_right?>"/> 
                            </p>
                            <p>
                                <label>- Website SEO meta author (READ ONLY)</label>
                                <input style="width: 100%;" class="input-medium" type="text" name="html_seo_author" value="<?=$s_html_seo_author?>" readonly="readonly"/> 
                            </p>
                            <p>
                                <label>- Website SEO meta keywords</label>
                                <input style="width: 100%;" class="input-medium" type="text" name="html_seo_keyword" value="<?=$s_html_seo_keyword?>"/> 
                            </p>
                            <p>
                                <label>- Website SEO meta description</label>
                                <input style="width: 100%;" class="input-medium" type="text" name="html_seo_description" value="<?=$s_html_seo_description?>"/> 
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
                                    <option value="<?=$cat_obj->id?>" <?php if($s_slider_category==$cat_obj->id) echo 'selected="selected"'; ?>><?php for($i=1;$i<=$cat_obj->level;$i++) { echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; } echo $cat_obj->name; ?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </p>
                            <p>
                                    <label>Slider auto scroll time</label>
                                    <input style="width: 40px;" type="text" class="input-short" name="slider_auto_scroll_time" value="<?php echo $s_slider_auto_scroll_time; ?>"/>&nbsp;(seconds) - set to 0 will deactivate auto scroll
                            </p>
                            <input class="submit-green" type="submit" value="Save"  />
                         </div> <!-- End .module-body -->
                    </div> <!-- End .module -->
                    <div style="clear:both;"></div>
                </div> <!-- End .grid_6 -->
                
                
                <!-- Widget -->
                <div class="grid_6">
                    <div class="module">
                         <h2><span>Posts and Pagination</span></h2>
    
                         <div class="module-body">
                            <?=show_notification($state,$unlink_count)?> 
                            
                            <p>
                                <label>Choose maximum characters for post's title preview</label>
                                <input name="maximum_preview_post_title" value="<?=$s_maximum_preview_post_title?>" class="input-medium" style="width: 100px;"/>
                            </p>
                            <p>
                                <label>Choose maximum characters for post's content preview</label>
                                <input name="maximum_preview_post_content" value="<?=$s_maximum_preview_post_content?>" class="input-medium" style="width: 100px;"/>
                            </p>
                            <input class="submit-green" type="submit" value="Save"  />
                         </div> <!-- End .module-body -->
                    </div> <!-- End .module -->
                    <div style="clear:both;"></div>
                </div> <!-- End .grid_6 -->
                <div style="clear:both;"></div>
                
                <div class="grid_6">
                    <!-- Notification boxes -->
                    
                    <div class="module">
                         <h2><span>Menu options</span></h2>
    
                         <div class="module-body">
                            <?=show_notification($state,$unlink_count)?>  
                            
                            <p>
                                <label>Choose Front's menu:</label>
                                <select class="input-long" name="main_menu_category">
                                    <?php
                                        foreach($menu_list as $item):
                                    ?>
                                    <option value="<?=$item->id?>" <?php if($s_main_menu_category==$item->id) echo 'selected="selected"'; ?>><?=$item->get_prefix_name('&nbsp&nbsp&nbsp&nbsp')?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </p>
                            <p>
                                <label>Choose Blog's menu:</label>
                                <select class="input-long" name="blog_menu_category">
                                    <?php
                                        foreach($menu_list as $item):
                                    ?>
                                    <option value="<?=$item->id?>" <?php if($s_blog_menu_category==$item->id) echo 'selected="selected"'; ?>><?=$item->get_prefix_name('&nbsp&nbsp&nbsp&nbsp')?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </p>
                            <p>
                                <label>Choose Admin's menu:</label>
                                <select class="input-long" name="admin_menu_category">
                                    <?php
                                        foreach($menu_list as $item):
                                    ?>
                                    <option value="<?=$item->id?>" <?php if($s_admin_menu_category==$item->id) echo 'selected="selected"'; ?>><?=$item->get_prefix_name('&nbsp&nbsp&nbsp&nbsp')?></option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </p>
                            
                            <input class="submit-green" type="submit" value="Save"  />
                         </div> <!-- End .module-body -->
                    </div> <!-- End .module -->
                    <div style="clear:both;"></div>
                </div>
                
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
                                    <option value="<?=$cat_obj->id?>" <?php if($s_homepage_widget_category==$cat_obj->id) echo 'selected="selected"'; ?>><?php for($i=1;$i<=$cat_obj->level;$i++) { echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; } echo $cat_obj->name; ?></option>
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
                                    <option value="<?=$cat_obj->id?>" <?php if($s_homepage_footer_widget_category==$cat_obj->id) echo 'selected="selected"'; ?>><?php for($i=1;$i<=$cat_obj->level;$i++) { echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; } echo $cat_obj->name; ?></option>
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
                
            </form>           
<?php
$this->load->view('admin/footer');
?>
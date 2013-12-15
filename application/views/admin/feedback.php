<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('admin/header');
?>
            <div class="grid_6">
            
                <div class="module">
                     <h2><span>Feedback detail</span></h2>
                        
                     <div class="module-body">
                            <input type="hidden" name="post_id" value="127">
                            <div>
                                <span class="notification n-success" style="display:none;">Updated successfully!</span>
                                <span class="notification n-success" style="display:none;">Added successfully!</span>
                                <span class="notification n-success" style="display:none;">Cloned successfully!</span>
                            </div>
                            
                            <p>
                                <label>Title</label>
                                <input type="text" class="input-long" name="post_title" value="<?=$feedback0->get_title() ?>" readonly="readonly">
                            </p>
                            
                            
                            <p></p>
                            
                            
                            <p>
                                <label>Short description</label>
                                <textarea name="post_content_lite" rows="10" cols="180" class="input-long" readonly="readonly"><?=$feedback0->get_content() ?></textarea>
                            </p>
                            
                            
                            

                            
                            
                            <fieldset>
                                <a href="http://localhost/cms/admin_posts/index/-1/1/1" class="button" style="margin-right: 10px;"><span>Back</span></a>
                                <a href="http://localhost/cms/admin_post/index/127/null//1" class="button" style="margin-right: 50px;"><span>Reload</span></a>
                                <input class="submit-green" type="submit" value="Submit"> 
                            </fieldset>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
            </div>
            <div class="grid_6">
            
                <div class="module">
                    <h2><span>Feedback's tools</span></h2>
                    
                    <div class="module-body">
                    <p>
                        <label>(renew post: action will delete current post and clone a new one)</label>
                        <a onclick="return confirm_click();" class="button" href="http://localhost/cms/admin_post/clone_to_top/127"><span>Reply</span></a>                            
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
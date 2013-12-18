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
                                <span class="notification n-success" <?php if(!in_array('send_ok', $state)) echo 'style="display:none;"'; ?>>Sent successfully!</span>
                            </div>
                            
                            <p>
                                <label>
                                Sender:
                                <?php if($feedback0->get_user_obj()!=null) {?>
                                (<a href="<?=site_url('admin_users/edit/'.$feedback0->get_user_obj()->id)?>">Internal system user</a>)
                                
                                <?php } ?>
                                <br />
                                -Fullname: <?=$feedback0->get_sender_name()?>
                                <br />
                                -Email: <?=$feedback0->get_sender_email()?>
                                <br />
                                -Phone: <?=$feedback0->get_sender_phone()?>
                                </label>
                                
                            </p>
                            
                            <p>
                                <label>Title</label>
                                <input type="text" class="input-long" name="post_title" value="<?=$feedback0->get_title() ?>" readonly="readonly">
                            </p>
                            
                            
                            
                            <p>
                                <label>Content</label>
                                <textarea name="post_content_lite" rows="10" cols="180" class="input-long" readonly="readonly"><?=$feedback0->get_content() ?></textarea>
                            </p>
                            
                            
                            

                            
                            
                            <fieldset>
                                <a href="<?=site_url('admin_posts/index/special/'.$special.'/cat_id/'.$cat_id.'/') ?>" class="button" style="margin-right: 10px;"><span>Back</span></a>
                                <a href="<?=site_url('admin_post/index/post_id/'.$feedback0->id.'/special/'.$special.'/cat_id/'.$cat_id) ?>" class="button" style="margin-right: 50px;"><span>Reload</span></a> 
                            </fieldset>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
            </div>
            <div class="grid_6">
            
                <div class="module">
                    <h2><span>Email tools</span></h2>
                    
                    <div class="module-body">
                        <form action="<?=site_url('admin_feedback/send/post_id/'.$feedback0->id.'/special/'.$special.'/cat_id/'.$cat_id) ?>" method="post">
                        <p>
                                <label>Send to:</label>
                                <input type="text" class="input-long" name="email" value="<?=$feedback0->get_sender_email() ?>">
                        </p>
                        <p>
                                <label>Subject</label>
                                <input type="text" class="input-long" name="subject" value="Re: <?=$feedback0->get_title() ?>">
                        </p>
                           
                        <p>
                            <label>Content</label>
                            <textarea id="wysiwyg" name="content" rows="10" cols="180" class="input-long">[Quoted]<hr /><?=$feedback0->get_content()?><hr /></textarea>
                        </p>
                        <p>
                            <input class="submit-green" type="submit" value="Send">
                        </p>
                        </form>
                                                    
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
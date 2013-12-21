<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('admin/header');
?>

            <!-- System statistics -->
            <div class="grid_5">
                <div class="module">
                        <h2><span>System statistics</span></h2>
                        
                        <div class="module-body">
                        
                        
                             <div>
                                 <div class="indicator">
                                     <div style="width: 23%;"></div><!-- change the width value (23%) to dynamically control your indicator -->
                                 </div>
                                 <p>Your storage space: 23 MB out of 100MB</p>
                             </div>
                             
                             <div>
                                 <div class="indicator">
                                     <div style="width: 100%;"></div><!-- change the width value (100%) to dynamically control your indicator -->
                                 </div>
                                 <p>Your bandwidth (January): 1 GB out of 1 GB</p>
                             </div>
                        </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End .grid_5 -->
            
            
            <!-- 10 User feedback -->
            <div class="grid_5">
                <div class="module">
                        <h2><span>Quick function</span></h2>
                        
                        <div class="module-body">
                        
                            <p>
                                <?php
                                if($feedback_category>0):
                                ?>
                                <a class="button" href="<?=site_url('admin_posts/index/special/1/cat_id/'.$feedback_category)?>">
                                    <span>
                                        View feedbacks
                                    </span>
                                </a>
                                <?php endif; ?>
                                
                                <?php
                                if($feedback_category<=0):
                                ?>
                                <label>There are no feedbacks right now</label>
                                <?php endif; ?>
                                
                            </p>

                        </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End .grid_5 -->
            
            <div style="clear:both;"></div>
            
            <!-- Account permission -->
            <div class="grid_5">
                <div class="module">
                        <h2><span>Account permission</span></h2>
                        
                        <div class="module-body">
                        
                            <p>
                                <b>Your right permission:</b>
                                <?php foreach($current_user->get_group_obj()->get_permission_list_obj() as $item) { ?>
                                
                                <?=$item->name.', '?>
                                
                                <?php } ?>
                            </p>

                        </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End .grid_5 -->
            
            <div style="clear:both;"></div>
            
            
            
<?php
//require_once('footer.php');
$this->load->view('admin/footer');
?>
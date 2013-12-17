<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('admin/header');
?>

            <!-- System statistics -->
            <div class="grid_5">
                <div class="module">
                        <h2><span>System statistics</span></h2>
                        
                        <div class="module-body">
                        
                        	<p>
                                <strong>User: </strong>User X<br />
                                <strong>Your last visit was on: </strong>20 January 2010,<br />
                                <strong>From IP: </strong>000.000.00.00
                            </p>
                        
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
                             
                        	<p>
                                Need to switch to a bigger plan?<br />
                                <a href="">click here</a><br />
                            </p>
                        </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End .grid_5 -->
            
            
            <!-- 10 User feedback -->
            <div class="grid_5">
                <div class="module">
                        <h2><span>User's feedbacks</span></h2>
                        
                        <div class="module-body">
                        
                            <p>
                                <?php
                                if($post_cmt!=null):
                                ?>
                                <a class="button" href="<?=site_url('admin_comments/index/'.$post_cmt->id)?>">
                                    <span>
                                        View feedbacks
                                    </span>
                                </a>
                                <?php endif; ?>
                                
                                <?php
                                if($post_cmt==null):
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
                                Your right permission:
                                
                                
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
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('admin/header');
?>

            <!-- module goes here -->
			<!-- Media -->
            <div class="grid_12">
                <!-- Notification boxes -->
                
                <div class="module">
                     <h2><span>Web Shell Detector v1.65</span></h2>
                     <div class="module-body">
                        <p>
                        Check for any malware like shell backdoor,...
                        </p>
                        <iframe src="<?=base_url()?>application/_static/anti_virus/" style="width: 100%; height: 600px;"></iframe>
                     </div> <!-- End .module-body -->
                </div> <!-- End .module -->
                <div style="clear:both;"></div>
            </div> <!-- End .grid_6 -->
            <div style="clear:both;"></div>
<?php
$this->load->view('admin/footer');
?>
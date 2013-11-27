<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('admin/header');
?>

            <!-- module goes here -->
			<!-- View fail because of wrong permission -->
            <div class="grid_6">
                <!-- Notification boxes -->
                
                <div class="module">
                     <h2><span>Permission denied</span></h2>

                     <div class="module-body">
                        <span class="notification n-error"><?=$state['message']?></span>  
                        <p>
                        Contact administrator for more infomation!
                        </p>
                     </div> <!-- End .module-body -->
                </div> <!-- End .module -->
                <div style="clear:both;"></div>
            </div> <!-- End .grid_6 -->
            <div style="clear:both;"></div>
<?php
$this->load->view('admin/footer');
?>
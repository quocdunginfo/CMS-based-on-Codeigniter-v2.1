<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('header.php');
?>

            <!-- module goes here -->
			<!-- View fail because of wrong permission -->
            <div class="grid_6">
                <!-- Notification boxes -->
                
                <div class="module">
                     <h2><span>Permission denied</span></h2>

                     <div class="module-body">
                        <span class="notification n-error"><?=$state[0]?></span>  
                        <p>
                        Contact administrator for more infomation!
                        </p>
                     </div> <!-- End .module-body -->
                </div> <!-- End .module -->
                <div style="clear:both;"></div>
            </div> <!-- End .grid_6 -->
            <div style="clear:both;"></div>
<?php
require_once('footer.php');
?>
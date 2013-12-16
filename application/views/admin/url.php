<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('admin/header');
?>

            <!-- module goes here -->
			<!-- Media -->
            <div class="grid_12">
                <!-- Notification boxes -->
                <script>
                    function qd_choose()
                    {
                        var value = document.getElementById("full_url").value;
                        //call parent function
                        window.opener.qd_menu_param(value);
                        window.close();
                        return false;
                    }
                </script>
                <div class="module">
                     <h2><span>URL function</span></h2>

                     <div class="module-body">
                        <p>
                        Full URL:
                        <br />
                        <input id="full_url" type="text" class="input-long" value="" />
                        </p>
                        <a href="javascript:qd_choose()" class="button"><span>Choose</span></a>
                     </div> <!-- End .module-body -->
                </div> <!-- End .module -->
                <div style="clear:both;"></div>
            </div> <!-- End .grid_6 -->
            <div style="clear:both;"></div>
<?php
$this->load->view('admin/footer');
?>
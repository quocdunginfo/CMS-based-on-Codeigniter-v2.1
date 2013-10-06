<?php
require_once('header.php');
?>
<!-- Main -->
<div id="main">
	<div class="shell">
		<div class="col" style="width:100%;">
			<div class="qd_post_container">
                <h2 class="qd_title" style="background-color: #E6E6E6; padding:5px 5px 5px 5px;">Contact form</h2>
                <div style="clear: both; height: 10px;"></div>
                <p style="color: red; margin-bottom: 10px;">
                    <?php
                    if($state=='null') { }
                    elseif($state=='submit_ok') { echo 'Sent successfully!'; }
                    else { echo $state; }
                    ?>
                </p>
                <?php 
                if($state!='submit_ok'):
                ?>
                <script>
                  function countChar(val) {
                    var len = val.value.length;
                    if (len >= 500) {
                      val.value = val.value.substring(0, 500);
                    } else {
                      $('#contact_content_counter').text((500 - len)+" chars left");
                    }
                  };
                </script>
                <p>
                	<form action="<?=site_url('contact/submit')?>" method="post">
                        <div style="width:100px; float:left; height:20px;">Your name:</div>
                        <input name="contact_name" type="text" value="" style="width:200px; height:20px;"/>
                        <div style="clear:both; height:10px;"></div>
                        
                        <div style="width:100px; float:left; height:20px;">Email:</div>
                        <input name="contact_email" type="text" value="" style="width:200px; height:20px;"/>
                        <div style="clear:both; height:10px;"></div>
                        
                        <div style="width:100px; float:left; height:20px;">Content:</div>
                        <textarea style="float: left; width: 400px; height: 100px;" onkeyup="countChar(this)" id="contact_content" maxlength="500" name="contact_content"></textarea>
						
                        <div style="float: left; padding-left: 10px;" id="contact_content_counter">Max: 500 chars</div>
                        
                        <div style="clear:both; height:10px;"></div>
                        
                        <!-- captcha -->
                        <?php
                        if($captcha_on==1):
                        ?>
                        <div style="margin-left: 100px;" ><?=$captcha?></div>
                        <div style="width:100px; float:left; height:20px;">Type code above:</div>
                        <input name="<?=$captcha_input_name?>" type="text" value="" style="width:100px; height:20px;"/>
                        <div style="clear:both; height:10px;"></div>
                        <?php endif; ?>
                        <!-- END captcha -->
                        <div style="float:left; margin-left:100px;">
                        	<input name="contact_submit" type="submit" value="Submit" style="border: 1px solid #CCC; padding:2px 7px 2px 7px;"/>
                        </div>
                        <div style="clear:both; height:10px;"></div>
                    </form>
                </p>
                <?php
                endif;
                ?>
            </div>
            <div class="cl" style="height:20px;"></div>
			
		</div>
		<div class="cl">&nbsp;</div>
        
        
	</div>
</div>
<!-- End Main -->
<?php
require_once('footer.php');
?>
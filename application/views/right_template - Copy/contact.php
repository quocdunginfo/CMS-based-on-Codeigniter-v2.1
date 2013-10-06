<?php
require_once('header.php');
?>
<!-- Main -->
<div id="main">
	<div class="shell">
		<div class="col" style="width:100%;">
			<div style="float:left; width:100%;">
                <h2 style="background-color: #E6E6E6; padding:5px 5px 5px 5px;">Contact form</h2>
                <p style="color: red;">
                    <?php
                    if($state=='null') { }
                    elseif($state=='submit_ok') { echo 'Sent successfully!'; }
                    else { echo $state; }
                    ?>
                </p>
                <?php 
                if($state!='submit_ok'):
                ?>
                <p>
                	<form action="<?=site_url('contact/submit')?>" method="post">
                        <div style="width:100px; float:left; height:20px;">Your name:</div>
                        <input name="contact_name" type="text" value="" style="width:200px; height:20px;"/>
                        <div style="clear:both; height:10px;"></div>
                        
                        <div style="width:100px; float:left; height:20px;">Email:</div>
                        <input name="contact_email" type="text" value="" style="width:200px; height:20px;"/>
                        <div style="clear:both; height:10px;"></div>
                        
                        <div style="width:100px; float:left; height:20px;">Content:</div>
                        <textarea name="contact_content" value="" style="width:400px; height:100px;" ></textarea>
						<div style="clear:both; height:10px;"></div>
                        
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
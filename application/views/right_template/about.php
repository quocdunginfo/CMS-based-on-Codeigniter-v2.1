<?php
require_once('header.php');
?>
<!-- Main -->
<div id="main">
	<div class="shell">
		<div class="col" style="width:100%;">
			<div class="qd_post_container">
                <h2 class="qd_title" style="background-color: #E6E6E6; padding:5px 5px 5px 5px;"><?=$post->title?></h2>
                <div style="clear: both; height: 10px;"></div>
				<p>
                	<?=$post->content?>
                </p>
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
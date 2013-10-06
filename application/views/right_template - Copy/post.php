<?php
require_once('header.php');
?>
<!-- Main -->
<div id="main">
	<div class="shell">
		<div class="col" style="width:70%; margin-right:10px;">
			<div style="float:left; width:100%;">
                <h2 style="background-color: #E6E6E6; padding:5px 5px 5px 5px; width:100%;">
                <?=$post->title?>
                </h2>
                <?=$post->content?>
            </div>
            <div class="cl" style="height:20px;"></div>
			
		</div>
        <div class="col" style="width:25%; float:right; margin-right:0px;">
			<h2>Panel</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dictum, neque ut imperdiet pellentesque, nulla tellus tempus magna, sed consectetur orci metus a justo. Aliquam ac congue nunc. Mauris a tortor ut massa egestas tempus. Pellentesque tincidunt fermentum diam sagittis ullamcorper.</p>
			<a href="#" class="find-more">find out more</a>
		</div>
		<div class="cl">&nbsp;</div>
        
        
	</div>
</div>
<!-- End Main -->
<?php
require_once('footer.php');
?>
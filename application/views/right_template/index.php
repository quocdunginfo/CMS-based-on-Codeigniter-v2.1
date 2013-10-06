<?php
require_once('header.php');
?>
<!-- Main -->
<div id="main">
	<div class="shell">
		<!-- homepage widget -->
		<?php
        $i=0;
        for($i=1;$i<=sizeof($post_widget);$i++):
        $post = $post_widget[$i-1];
        ?>
        <div class="col<?php if($i%3==0) echo ' last'; else echo ''; ?>" style="margin-bottom: 30px;">
			<h2 class="qd_title2"><?=$post->title?></h2>
			<img src="<?=$post->avatar?>" alt="" class="right" style="max-width: 150px; max-height: 150px;"/>
			<p>
                <?=$post->content?>
            </p>
			<div class="cl">&nbsp;</div>
			<?php
            if($post->url!=''):
            ?>
            <a href="<?=$post->url?>" class="find-more">Find out more...</a>
            <?php endif; ?>
		</div>
        <?php
        if($i%3==0):
        ?>
        <div class="cl">&nbsp;</div>
        <?php endif; ?>
        <?php
        endfor;
        ?>
        <!-- end homepage widget -->
        
        <div class="cl" style="height:70px;">&nbsp;</div>
        <!-- Gradient transparent - color - transparent -->
        <style>
        hr {
            margin-left: 100px; margin-right: 100px; margin-top: 20px; margin-bottom: 20px; 
        }
        
        hr.style-one {
            border: 0;
            height: 1px;
            background: #333;
            background-image: -webkit-linear-gradient(left, #ccc, #333, #ccc); 
            background-image:    -moz-linear-gradient(left, #ccc, #333, #ccc); 
            background-image:     -ms-linear-gradient(left, #ccc, #333, #ccc); 
            background-image:      -o-linear-gradient(left, #ccc, #333, #ccc); 
        }
        
        hr.style-two {
            border: 0;
            height: 1px;
            background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
            background-image:    -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
            background-image:     -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
            background-image:      -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
        }
        </style>
        <!-- <hr class="style-two"> -->
        <!-- footer widget -->
        <?php
        $i=0;
        for($i=1;$i<=sizeof($post_footer_widget);$i++):
        $post = $post_footer_widget[$i-1];
        ?>
        <div class="<?php if($i%3==0) echo 'col last'; else echo 'col'; ?>">
			<h2 class="qd_title2"><?=$post->title?></h2>
			<img src="<?=$post->avatar_thumb?>" alt="" class="right" style="max-width: 150px; max-height: 150px;"/>
			<p>
                <?=$post->content?>
            </p>
			<div class="cl">&nbsp;</div>
			 
                <?php
                if($post->url!=''):
                ?>
                <a href="<?=$post->url?>" class="find-more">Find out more...</a>
                <?php endif; ?>
            
		</div>
        <?php
        if($i%3==0):
        ?>
        <div class="cl">&nbsp;</div>
        <?php endif; ?>
        <?php endfor; ?>
		<div class="cl">&nbsp;</div>
        <!-- end footer widget -->
        
	</div>
</div>
<!-- End Main -->
<?php
require_once('footer.php');
?>
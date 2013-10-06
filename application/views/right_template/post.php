<?php
require_once('header.php');
?>
<!-- Main -->
<div id="main">
	<div class="shell">
		<style>
		.col ul {
			font-size:14px; color:#666;margin-left:20px; margin-bottom:20px;
		}
		.col ul li {
			list-style-type: none;
		}
		.col h3 {
			font-size:16px;
			font-weight: bold;
		}
		</style>
        <div class="col" style="width:25%; float:left; margin-right:15px;">
			<h2 class="qd_title2">Categories</h2>
			<?=$category_tree?>
		</div>
        <a name="post_view"></a>
        <div class="col" style="width:70%; margin-right:0px; float: right;">
			<div class="qd_post_container">
                <a href="<?=site_url('post/detail/'.$post->id.'/'.$post->title_for_url).'#post_view'?>">
                    <h2 class="qd_title">
                        <?=$post->title?>
                    </h2>
                </a>
                <span style="float: left;">Posted by <?=$post->user_id_obj->username?> in <?=$post->get_cat_list_text()?></span>
                <span style="float: right;"><?=$post->date_create?></span>
                <div style="clear: both;"></div>
                <hr class="style-two"/>
                <p><?=$post->content?></p>
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
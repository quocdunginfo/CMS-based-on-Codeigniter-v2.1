<?php
require_once('header.php');
?>
<!-- Main -->
<div id="main">
	<div class="shell">
        <div class="col" style="width:25%; float:left; margin-right:15px;">
			<h3 class="qd_title2">Categories</h3>
			<div class="qd_tree">
                <?=$category_tree?>
            </div>
            
			<!-- <a href="#" class="find-more">find out more</a> -->
		</div>
        <a name="post_view"></a>
        <div class="col" style="width:70%; margin-right:0px; float: right;">
            <?php
            foreach($post_list as $post):
            ?>
            <div class="qd_post_container" style="">
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
                <!-- <a href="<?=site_url('post/detail/'.$post->id)?>" class="find-more">read more...</a> -->
            </div>
            <div class="cl" style="height:50px;"></div>
            <?php endforeach; ?>
            <!-- pagination -->
            <style>
				.pagination {
					//background: #f2f2f2;
					padding: 20px;
					margin-bottom: 20px;
					text-align:center;
				}
				
				.page {
					display: inline-block;
					padding: 0px 9px;
					margin-right: 4px;
					border-radius: 3px;
					border: solid 1px #c0c0c0;
					background: #e9e9e9;
					box-shadow: inset 0px 1px 0px rgba(255,255,255, .8), 0px 1px 3px rgba(0,0,0, .1);
					font-size: .875em;
					font-weight: bold;
					text-decoration: none;
					color: #717171;
					text-shadow: 0px 1px 0px rgba(255,255,255, 1);
				}
				
				.page:hover {
					background: #fefefe;
					background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#FEFEFE), to(#f0f0f0));
					background: -moz-linear-gradient(0% 0% 270deg,#FEFEFE, #f0f0f0);
				}
				
				.page.active {
					border: none;
					background: #616161;
					box-shadow: inset 0px 0px 8px rgba(0,0,0, .5), 0px 1px 0px rgba(255,255,255, .8);
					color: #f0f0f0;
					text-shadow: 0px 0px 3px rgba(0,0,0, .5);
				}
            </style>
    
            <div class="pagination"><?=$navigation?></div>
            <div class="cl" style="height:20px;"></div>
		</div>
        
		<div class="cl">&nbsp;</div>
        
        
	</div>
</div>
<!-- End Main -->
<?php
require_once('footer.php');
?>
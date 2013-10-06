<?php
require_once('header.php');
$this->load->helper('qd_text_helper');
$max_content_lenght = 300;
$max_title_lenght = 80;
?>
<!-- Main -->
<div id="main">
	<div class="shell">
		<div class="col" style="width:70%; margin-right:15px; float: left;">
			<?php
            foreach($post_list as $post):
            ?>
            
            <div style="">
                <a href="<?=site_url('post/detail/'.$post->id)?>">
                    <h2 style="background-color: #E6E6E6; padding:5px 5px 5px 5px; width: 100%;">
                        <?=qd_html_truncate($post->title,$max_title_lenght)?>
                    </h2>
                </a>
                <p><?=qd_html_truncate($post->content,$max_content_lenght)?></p>
                <!-- <a href="<?=site_url('post/detail/'.$post->id)?>" class="find-more">read more...</a> -->
            </div>
            <div class="cl" style="height:20px;"></div>
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
            <!-- old -->
            <div class="pagination">
                <a href="<?php echo site_url('category/view/'.$cat_id.'/1'); ?>" class="page">first</a>
                <a href="<?php echo site_url('category/view/'.$cat_id.'/'.($page_current-1<1?1:$page_current-1)); ?>" class="page">prev</a>
                <a href="<?=site_url('category/view/'.$cat_id.'/'.$page_current)?>" class="page active"><?=$page_current?></a>
                <a href="<?php echo site_url('category/view/'.$cat_id.'/'.($page_current+1>$page_total?$page_total:$page_current+1)); ?>" class="page">next</a>
                <a href="<?php echo site_url('category/view/'.$cat_id.'/'.$page_total); ?>" class="page">last</a>
            </div>
            
            
            
            <div class="cl" style="height:20px;"></div>
		</div>
        
        <div class="col" style="width:25%; float:right; margin-right:0px;">
			<h2>Categories</h2>
			<p>
            Category tree here
            </p>
			<!-- <a href="#" class="find-more">find out more</a> -->
		</div>
		<div class="cl">&nbsp;</div>
        
        
	</div>
</div>
<!-- End Main -->
<?php
require_once('footer.php');
?>
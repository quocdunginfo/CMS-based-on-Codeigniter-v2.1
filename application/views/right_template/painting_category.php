<?php
require_once('header.php');
$this->load->helper('qd_text_helper');
?>
<!-- Main -->
<div id="main">   
    <div class="shell">
        <div class="col" style="width:25%; float:left; margin-right:15px;">
			<form action="<?=site_url('search/submit').'#painting_view'?>" method="post">
                <h3 class="qd_title2"><a href="<?=site_url('painting_category')?>">Thể loại tranh</a></h3>
    			<div class="qd_tree">
                    <?=$painting_category_tree?>
                </div>
    			<h3 class="qd_title2">Chất liệu tranh</h3>
    			<div class="qd_tree">
                    <?=$material_category_tree?>
                </div>
                <style>
                .qd_search {
                    float: right;
                    background-image: url('css/images/search-icon.png');
                    background-repeat: no-repeat; background-position:  70px 0px;
                    height: 30px; width: 100px;
                    border: 0px;
                    font-size: 16px; text-align: left;
                    padding-left: 5px;
                    background-color: white;
                }
                </style>
                <input class="qd_search" type="submit" value="Search"/>
                <div style="clear: both;"></div>
                <a href="<?=site_url('search/off_multi_term')?>">
                    <div style="font-size: 12px; float: left;">Turn off advanced search</div>
                </a>
                <div style="clear: both;"></div>
            </form>
		</div>
        
        
        <script>
		$(window).load(function(){
		 $('.qdAvatar').find('img').each(function(){
		  var imgClass = (this.width/this.height > 1) ? 'wide' : 'tall';
		  $(this).addClass(imgClass);
		 })
		})
		
		</script>
        <style>
        .qdAvatar {
			width:300px; height:auto; float:left; text-align:center;
		}
		.qdAvatar img.wide {
			width: 100%; height: auto;
		}
		.qdAvatar img.tall {
			height: 100%; width: auto;
		}​
		.qd_post_container {
			float:left; width:100%;
		}
        .qd_post_container .table{
			float:left; font-size: 16px; margin-left: 10px; font:Tahoma, Geneva, sans-serif; width: 350px;
		}
		.painting_post table {
			width:350px; color:#333;
		}
		.qd_post_container table tr {
			vertical-align:top
		}
		.qd_post_container table tr .label {
			width:100px; vertical-align:top; color:#999
		}
		
        </style>
        <a name="post_view"></a>
        <div class="col" style="width:70%; margin-right:0px; float: right;">
            <?php
            foreach($painting_post_list as $painting_post):
            ?>
            <!-- painting_post -->
            <div class="qd_post_container">
                <h2 class="qd_title"><?=$painting_post->title?></h2>
                <div style="clear: both; height: 10px;"></div>
                <div class="qdAvatar">
                	<a class="single_image" title="<?=$painting_post->title?>" href="<?=$painting_post->avatar?>"><img src="<?=$painting_post->avatar_thumb?>" /></a>
                </div>
                <div class="table">
                	<table>
                        <tr>
                        	<td class="label">Mã:</td>
                            <td><?=$painting_post->art_id?></td>
                        </tr>
                        <tr>
                        	<td class="label">Thể loại:</td>
                            <td><?=$painting_post->get_cat_painting_list_text()?></td>
                        </tr>
                        <tr>
                        	<td class="label">Kích thước:</td>
                            <td><?=$painting_post->art_width?> x <?=$painting_post->art_height?>&nbsp;<?=$painting_post->art_sizeunit?></td>
                        </tr>
                        <tr>
                        	<td class="label">Chất liệu:</td>
                            <td>
                            <?=$painting_post->get_cat_material_list_text()?>
                            </td>
                        </tr>
                        <tr>
                        	<td class="label">Mô tả:</td>
                            <td><?=$painting_post->content_lite?></td>
                        </tr>
                        <tr>
                            <td class="label">Tình trạng:</td>
                            <td><?php if($painting_post->art_sold==1) echo 'Tạm hết hàng'; else echo 'Còn hàng';?></td>
                        </tr>
                        <tr>
                            <td class="label">Giá tiền:</td>
                            <td><?=$painting_post->art_price?> (VND)</td>
                        </tr>
                    </table>
                </div>
                <div style="clear:both"></div>
            </div>
            <div style="clear:both; height:20px;"></div>
            <!-- end painting_post -->
            <?php endforeach; ?>
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
            <div class="pagination">
                <?=$navigation?>
            </div>
		</div>
        
		<div class="cl">&nbsp;</div>
        
        
	</div>
</div>
<!-- End Main -->
<?php
require_once('footer.php');
?>
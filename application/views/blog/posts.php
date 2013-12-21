<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('blog/header');
?>
        <div class="mainbar">
        <?php if(sizeof($post_list)<=0) { ?>
        <div class="article">
            <h2>There're no posts in this category now</h2>
        </div>
        <?php } ?>
        
        <?php foreach($post_list as $item) { ?>
        <div class="article">
          <h2><span><a href="<?=site_url('blog/post/index/'.$item->id) ?>"><?=$item->title?></a></span></h2>
          <div class="clr"></div>
          <p><span class="date">Date: <a href="javascript:void(0)"><?=$item->date_create?></a></span> &nbsp;|&nbsp; Posted by <a href="javascript:void(0)"><?php if($item->get_user_obj()!=null) echo $item->get_user_obj()->username?></a> &nbsp;|&nbsp; Filed under <?=$item->get_cat_list_text()?> </p>
          <?=qd_html_truncate($item->content,800,'...')?>
          <p class="spec"><a href="<?=site_url('blog/post/index/'.$item->id) ?>" class="rm">Full detail &raquo;</a></p>
        </div>
        <?php } ?>
        
        <p class="pages"><?=$pagination->generate_link(3)?></p>
      </div>
<?php
$this->load->view('blog/footer');
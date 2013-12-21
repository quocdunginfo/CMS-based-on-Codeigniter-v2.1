<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('blog/header');
?>
        <div class="mainbar">
        <?php if($post0==null) { ?>
        <div class="article">
            <h2>There is no post found!</h2>
        </div>
        <?php } ?>
        
        <div class="article">
          <h2><span><a href="<?=site_url('blog/post/index/'.$post0->id) ?>"><?=$post0->title?></a></span></h2>
          <div class="clr"></div>
          <p><span class="date">Date: <a href="javascript:void(0)"><?=$post0->date_create?></a></span> &nbsp;|&nbsp; Posted by <a href="javascript:void(0)"><?php if($post0->get_user_obj()!=null) echo $post0->get_user_obj()->username?></a> &nbsp;|&nbsp; Filed under <?=$post0->get_cat_list_text()?> </p>
          <?=$post0->content?>
        </div>
      </div>
<?php
$this->load->view('blog/footer');
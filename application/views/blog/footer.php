<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
        <div class="sidebar">
        
        <div class="gadget">
          <h2 class="star"><span>Categories</span> </h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <?php foreach($post_list_cat as $item) { ?>
            <li><a href="<?=site_url('blog/posts/category/id/'.$item->id)?>"><?=$item->get_prefix_name('&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp')?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image Gallery</span></h2>
        <a href="javascript:void(0)"><img src="images/pix1.jpg" width="58" height="58" alt="" /></a> <a href="javascript:void(0)"><img src="images/pix2.jpg" width="58" height="58" alt="" /></a> <a href="javascript:void(0)"><img src="images/pix3.jpg" width="58" height="58" alt="" /></a> <a href="javascript:void(0)"><img src="images/pix4.jpg" width="58" height="58" alt="" /></a> <a href="javascript:void(0)"><img src="images/pix5.jpg" width="58" height="58" alt="" /></a> <a href="javascript:void(0)"><img src="images/pix6.jpg" width="58" height="58" alt="" /></a> </div>
      <div class="col c2">
        <h2><span>Lorem Ipsum</span></h2>
        <p>Lorem ipsum dolor<br />
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. <a href="javascript:void(0)">Morbi tincidunt, orci ac convallis aliquam</a>, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam.</p>
      </div>
      <div class="col c3">
        <h2><span>Contact</span></h2>
        <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue.</p>
        <p><a href="javascript:void(0)">support@yoursite.com</a></p>
        <p>+1 (123) 444-5677<br />
          +1 (123) 444-5678</p>
        <p>Address: 123 TemplateAccess Rd1</p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf"><?=$html_footer_left?></p>
      <p class="rf"><?=$html_footer_right?></p>
      <div class="clr"></div>
    </div>
  </div>
</div>
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>

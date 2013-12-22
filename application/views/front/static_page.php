<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view($_tpl.'header');
?>
<div id="content" class="float_r faqs">
    <h2><?=$static_page0->title?></h2>
    <?=$static_page0->content?>
</div>
<?php
$this->load->view($_tpl.'footer');

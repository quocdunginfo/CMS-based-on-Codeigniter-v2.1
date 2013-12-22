<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$data__['_tpl'] = 'front/';//kế thừa từ gì
$this->load->view('front/header', $data__);
?>
<div id="content" class="float_r faqs">
    <h2><?=$error_title?></h2>
    <?=$error_message?>
</div>
<?php
$this->load->view('front/footer', $data__);

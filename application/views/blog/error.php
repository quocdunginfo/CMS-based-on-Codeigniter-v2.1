<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view($_tpl.'header');
?>
<div class="mainbar">
        
        <div class="article">
            <h2><?=$error_title?></h2>
            <h4><?=$error_message?></h4>
        </div> 
</div>
<?php
$this->load->view($_tpl.'footer');

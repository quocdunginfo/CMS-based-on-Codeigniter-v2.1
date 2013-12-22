<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view($_tpl.'header');
?>
<div id="content" class="float_r">
    <h2>Đăng nhập</h2>
    <?php if(in_array('fail',$state)) { ?>
    <span style="color: red;">Sai tên đăng nhập hoặc mật khẩu!</span>
    <?php } ?>
    <div id="contact_form" style="width:280px">
        <form method="post" name="contact" action="<?=site_url($_com.'login/submit')?>">

            <label for="author">Tên đăng nhập:</label>
            <input type="text" name="username" class="required input_field" value="<?=$pre_username?>">
            <div class="cleaner h10"></div>
            <label for="email">Mật khẩu:</label>
            <input type="password" name="password" class="validate-email required input_field">
            <div class="cleaner h10"></div>
            <div>
                <input type="checkbox" name="remember" value="1">
                Ghi nhớ mật khẩu 
                <div style="float:right">
                <a href="<?=site_url($_com.'forgot_password')?>">Quên mật khẩu</a>
                </div>
            </div>
            <div class="cleaner h10"></div>
            <input type="submit" class="submit_btn" name="submit" id="submit" value="Đăng nhập">
        </form>
    </div>
</div>


<?php
$this->load->view($_tpl.'footer');

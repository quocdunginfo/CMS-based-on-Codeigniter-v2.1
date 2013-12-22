<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view($_tpl.'header');
?>
<div id="content" class="float_r">
    <h2>Thông tin khách hàng</h2>
    <?php if(in_array('edit_ok',$state)) { ?>
    <h4 style="color:blue; font-size: 14px;">
        Cập nhật thành công!
    </h4>
    <?php } ?>
    <div class="content_half float_l" style="width:auto">        
        <div id="contact_form" style="width:auto">
            <form method="post" name="contact" action="<?=site_url($_com.'account/submit') ?>">
                <label for="author">Tên đăng nhập:</label>
                <input type="text" class="required input_field" value="<?=$current_user->username?>" style="float:left; border:none" readonly="readonly">
                <div class="cleaner h10"></div>

                <label for="author">Mật khẩu:</label>
                <input type="password" name="password" class="required input_field" value="<?=$password?>" style="float:left">
                <sup style="color:red; float:left">*</sup>
                <span style="color:red; float:left">
                <?php
                if(in_array('password_fail',$state))
                {
                    echo 'Không hợp lệ hoặc không khớp';
                }
                ?>
                </span>
                <div class="cleaner h10"></div>

                <label for="author">Nhập lại mật khẩu:</label>
                <input type="password" name="password2" class="required input_field" value="<?=$password2?>" style="float:left">
                <sup style="color:red; float:left">*</sup>
                <span style="color:red; float:left">
                <?php
                if(in_array('password_fail',$state))
                {
                    echo 'Không hợp lệ hoặc không khớp';
                }
                ?>
                </span>
                <div class="cleaner h10"></div>

                <label for="author">Tên đầy đủ:</label>
                <input type="text" name="fullname" class="required input_field" value="<?=$current_user->fullname?>" style="float:left">
                <sup style="color:red; float:left">*</sup>
                <span style="color:red; float:left">
                <?php
                if(in_array('fullname_fail',$state))
                {
                    echo 'Không hợp lệ';
                }
                ?>
                </span>
                <div class="cleaner h10"></div>
                
                <label for="email">Email:</label>
                <input type="text" name="email" class="validate-email required input_field" value="<?=$current_user->email?>" style="float:left">
                <sup style="color:red; float:left">*</sup>
                <span style="color:red; float:left">
                <?php
                if(in_array('email_exist_fail',$state))
                {
                    echo 'Email đã có người dùng';
                } else if(in_array('email_fail',$state))
                {
                    echo 'Không hợp lệ';
                }
                ?>
                </span>
                <div class="cleaner h10"></div>

                <label for="phone">Số điện thoại:</label>
                <input type="text" name="phone" class="input_field" value="<?=$current_user->phone?>" style="float:left">
                <div class="cleaner h10"></div>

                <label for="phone">Địa chỉ:</label>
                <input type="text" name="address" class="input_field" value="<?=$current_user->address?>" style="float:left">
                <div class="cleaner h10"></div>
                <input type="submit" class="submit_btn" name="submit" id="submit" value="Lưu">
            </form>
        </div>
    </div>

    <div class="cleaner h40"></div>



</div>
<?php
$this->load->view($_tpl.'footer');
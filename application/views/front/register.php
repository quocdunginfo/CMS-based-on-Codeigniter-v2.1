<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('front/header');
?>
<div id="content" class="float_r">
    <h2>Đăng ký tài khoản khách hàng</h2>
    <div class="content_half float_l" style="width:auto">
        <p></p>
        <div id="contact_form" style="width:auto">
            <form method="post" name="contact" action="<?=site_url('front/register/submit')?>">

                <label for="username">Tên đăng nhập:</label>
                <input type="text" name="username" class="required input_field" value="<?=$user0->username?>" style="float:left">
                <sup style="color:red; float:left">*</sup>
                <span style="color:red; float:left">
                    <?php
                    if(in_array('username_fail',$state))
                    {
                        echo 'Không hợp lệ';
                    }
                    else if (in_array('username_exist_fail',$state))
                    {
                        echo 'Tên đăng nhập đã có người dùng';
                    }
                    
                    ?>
                </span>
                <div class="cleaner h10"></div>

                <label for="password">Mật khẩu:</label>
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

                <label for="password2">Nhập lại mật khẩu:</label>
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

                <label for="fullname">Tên đầy đủ:</label>
                <input type="text" name="fullname" class="required input_field" value="<?=$user0->fullname?>" style="float:left">
                <sup style="color:red; float:left">*</sup>
                <span style="color:red; float:left">
                <?php
                    if(in_array('fullname_fail',$state))
                    {
                        echo 'Không hợp lệ hoặc không khớp';
                    }
                    
                    ?>
                </span>
                <div class="cleaner h10"></div>
                
                <label for="email">Email:</label>
                <input type="text" name="email" class="validate-email required input_field" value="<?=$user0->email?>" style="float:left">
                <sup style="color:red; float:left">*</sup>
                <span style="color:red; float:left">
                    <?php
                    if(in_array('email_fail',$state))
                    {
                        echo 'Không hợp lệ';
                    }
                    else if (in_array('email_exist_fail',$state))
                    {
                        echo 'Email đã có người dùng';
                    }
                    
                    ?>
                </span>
                <div class="cleaner h10"></div>

                <label for="phone">Số điện thoại:</label>
                <input type="text" name="phone" class="input_field" value="<?=$user0->phone?>" style="float:left">
                <div class="cleaner h10"></div>

                <label for="address">Địa chỉ:</label>
                <input type="text" name="address" class="input_field" value="<?=$user0->address?>" style="float:left">
                <div class="cleaner h10"></div>
                
                <label for="captcha">Mã bảo vệ:
                <strong style="font-size: 16px; "><?=$captcha_value?></strong>
                </label>
                
                <input type="text" name="<?=$captcha_name?>" class="input_field" style="width:90px; float:left" value="">
                <sup style="color:red; float:left">*</sup>
                <span style="color:red; float:left">
                <?php
                    if(in_array('captcha_fail',$state))
                    {
                        echo 'Sai mã bảo vệ';
                    }
                ?>
                </span>

                <div class="cleaner h10"></div>
                <input type="submit" class="submit_btn" name="submit" id="submit" value="Đăng ký">
            </form>
        </div>
    </div>

    <div class="cleaner h40"></div>



</div>
<?php
$this->load->view('front/footer');

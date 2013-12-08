<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//registered varibles
//$order0 obj
//state array
$this->load->view('admin/header');
?>

            <!-- module goes here -->
            <div class="grid_4">
                <!-- Notification boxes -->
                <div>
                    <span class="notification n-success" <?php if(!in_array('delete_ok',$state)) echo 'style="display:none;"'; ?>>Deleted successfully!</span>
                </div>
                
                <!-- Example table -->
                <div class="module">
                	<h2><span>Customer detail</span></h2>
                    <style type="text/css">
                    .module-body label{
                        float: left; width: 70px;
                    }
                    .module-body span{
                        display: inline-block;
                        width: 200px; float: left;
                        font-weight: bold;
                    }
                    </style>
                    <div class="module-body">
                            <p>
                                <label>Full name:</label>
                                <span><?=$order0->get_customer_user_obj()->fullname?></span>
                                <div style="clear: both;"></div>
                            </p>
                            <p>
                                <label>Address:</label>
                                <span><?=$order0->get_customer_user_obj()->address?></span>
                                <div style="clear: both;"></div>
                            </p>
                            <p>
                                <label>Phone:</label>
                                <span><?=$order0->get_customer_user_obj()->phone?></span>
                                <div style="clear: both;"></div>
                            </p>
                    </div>
                </div>
            </div>
            <!-- module goes here -->
            <div class="grid_8">
                <!-- Notification boxes -->
                <div>
                    <span class="notification n-success" <?php if(!in_array('delete_ok',$state)) echo 'style="display:none;"'; ?>>Deleted successfully!</span>
                </div>
                
                <!-- Example table -->
                <div class="module">
                	<h2><span>Order detail</span></h2>
                    <div class="module-body">
                            <p>
                                <label style="width:100px">Date create:</label>
                                <span><?=$order0->date_create?></span>
                                
                                
                                <span style="float: right;"><?=$order0->date_modify?></span>
                                <label style="width:100px; float: right">Date modify:</label>
                                <div style="clear: both;"></div>
                                
                            </p>
                            <p>
                                
                            </p>
                            <form id="status" action="<?=site_url('admin_order/edit')?>" method="post" style="width: auto;">
                            <p>
                                <label style="width:100px">
                                Status:
                                </label>
                                <script type="text/javascript">
                                function form_submit(id)
                                {
                                    if(confirm('Bạn có muốn cập nhật trạng thái đơn hàng ?'))
                                    {
                                        document.getElementById(id).submit();
                                    }
                                    else
                                    {
                                        return false;
                                    }
                                }
                                </script>
                                <span style="width: 150px;">
                                
                                <input type="hidden" name="id" value="<?=$order0->id?>" />
                                <?php if($order0->get_status()!='dabihuy') : ?>
                                <select name="status" class="input-medium" style="width: 150px;">
                                    <?php
                                    $_array = $order0->get_status_array_en();
                                    while(($_value = current($_array)) !== FALSE )
                                    {
                                        $_key = key($_array);
                                        ?>
                                        <option
                                        value="<?=$_key?>"
                                        <?php if($order0->get_status()==$_key) echo 'selected="selected"'; ?>
                                        >
                                            <?=$_value?>
                                        </option>
                                        <?php
                                        
                                        next($_array);
                                    }
                                    
                                    ?>
                                </select>
                                <img src="src/refresh-icon.png" style="margin-left: 10px;" onclick="form_submit('status')" OnMouseOver="this.style.cursor='pointer';" OnMouseOut="this.style.cursor='default';"/>
                                <?php endif; ?>
                                <?php if($order0->get_status()=='dabihuy') : ?>
                                <span style="width: 150px;">
                                    <?=$order0->get_status_en()?>
                                </span>
                                <?php endif; ?>
                                </span>
                                
                                
                                
                                
                                <span style="float: right;">
                                <?php if($order0->order_online_payment==1)
                                    echo 'Yes';
                                else
                                    echo 'No';
                                ?>
                                </span>
                                <label style="width:100px; float: right;">
                                Online payment:
                                </label>
                                
                                <div style="clear: both;"></div>
                            </p>
                            </form>
                            <p>
                                <label style="width:100px;">Manager:</label>
                                <span>
                                <?php if($order0->get_user_obj()!=null) 
                                    echo $order0->get_user_obj()->fullname;
                                else
                                    echo '(Not yet)';
                                ?></span>
                                
                                <div style="clear: both;"></div>
                            </p>
                    </div>
                </div>
            </div>
            <!-- module goes here -->
			<div class="grid_12">
                <!-- Notification boxes -->
                <div>
                    <span class="notification n-success" <?php if(!in_array('delete_ok',$state)) echo 'style="display:none;"'; ?>>Deleted successfully!</span>
                </div>
                
                <!-- Example table -->
                <div class="module">
                	<h2><span>Order items</span></h2>
                    
                    <div class="module-table-body">
                        <table id="myTable" class="tablesorter" style="margin: 0px 0px 0px 0px;">
                        	<thead>
                                <tr>
                                    <th style="width:4%">P_ID</th>
                                    <th >P_Name</th>
                                    <th style="width:15%">P_Image</th>
                                    <th style="width:10%">Unitprice</th>
                                    <th style="width:70px">Count</th>
                                    <th style="width:100px">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($order0->get_order_detail_list() as $obj):
                                ?>
                                <tr>                                    
                                    <td class="align-center">
                                    <?=$obj->get_product_obj()->id; ?>
                                    </td>
                                    <td>
                                    <?=$obj->get_product_obj()->title; ?>
                                    </td>
                                    <td>
                                    <img src="<?=$obj->get_product_obj()->get_avatar_thumb(); ?>" style="max-width: 70px; max-height: 70px;" />
                                    
                                    </td>
                                    <td><?=$obj->order_unitprice?></td>
                                    <td><?=$obj->order_count?></td>
                                    <td><?=$obj->get_total(); ?></td>
                                </tr>
                                <?php endforeach; ?>
                                
                                
                            </tbody>
                        </table>
                        <style type="text/css">
                        .qd_cell {
                            float: right; width: auto; border: solid 1px #d9d9d9; margin-top: 0px; margin-right: 1px; padding: 5px;
                            font-weight: bold;
                        }
                        </style>
                        <div class="qd_cell" style="width: 100px; ">
                        <?=$order0->order_total?>
                        </div>
                        <span class="qd_cell" style="width: 70px; margin-right: -1px;">
                        Total:
                        </span>
                        <div style="clear: both;"></div>
                        
                        <div class="pager" id="pager">
                            <form action="">
                                <div>
                                <img class="first" src="src/arrow-stop-180.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-180.gif" alt="first"/>
                                <img class="prev" src="src/arrow-180.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-180.gif" alt="prev"/> 
                                <input type="text" class="pagedisplay input-short align-center"/>
                                <img class="next" src="src/arrow.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow.gif" alt="next"/>
                                <img class="last" src="src/arrow-stop.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop.gif" alt="last"/> 
                                <select class="pagesize input-short align-center">
                                    <option value="10" >10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40" selected="selected">40</option>
                                </select>
                                </div>
                            </form>
                        </div>
                        <div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->
                
                
                <div class="pagination">           
                    
                </div>
                 
			</div> <!-- End .grid_12 -->
            <div style="clear:both;"></div>
<?php
$this->load->view('admin/footer');
?>
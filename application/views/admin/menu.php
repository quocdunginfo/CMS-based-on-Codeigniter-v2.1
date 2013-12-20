<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$this->load->view('admin/header');
?>
            <div class="bottom-spacing" style="margin-left: 10px;">
                
                    <!-- Button -->
                    <div class="float-left">
                        <a href="<?=site_url('admin_menu')?>" class="button">
                        	<span>New menu <img src="src/plus-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/plus-small.gif" width="12" height="9" alt="New menu"></span>
                        </a>
                    </div>
                    
            </div>
            <div style="clear: both;"></div>
            <!-- module goes here -->
			<!-- Category -->
            <div class="grid_6">
                <!-- Notification boxes -->
                
                
                
                <div class="module">
                     <h2><span>Menus</span></h2>

                     <div class="module-body">
                        <a name="cat_add"></a>
                        <span class="notification n-success" <?php if(!in_array('add_ok',$state)) echo 'style="display:none;"'; ?>>Added successfully!</span>
                        <p>
                        Choose parent menu:
                        </p>
                          
                        <form action="<?php echo site_url('admin_menu/add'); ?>" method="post">
                            <fieldset>
                                <ul class="qdClass" style="border:2px solid #ccc; width:80%px; height: 450px; overflow-y: scroll; padding:10px 10px 10px 10px;">
                                    <li>
                                        <label>
                                            <input checked="checked" type="radio" name="cat_radio_list[]" value="-1"/>
                                            [Root menu]
                                        </label>
                                    </li>
                                    <?php
                                    
                                    foreach($menu_list as $item):
                                
                                    ?>
                                    
                                    <li>
                                        <label>
                                            
                                            <input id="cat_id_<?=$item->id?>" style="margin-left:<?php echo ($item->level+1)*20; ?>px;" type="radio" name="cat_radio_list[]" value="<?php echo $item->id; ?>" onclick="qd_tranfer_parent_id(<?=$item->id?>)" <?php if($menu0->get_parent_cat_obj()!=null && $menu0->get_parent_cat_obj()->id==$item->id) echo 'checked="checked"'; ?>/>
                                            <?php if($menu0->get_parent_cat_obj()!=null && $menu0->get_parent_cat_obj()->id==$item->id) { ?>
                                            <script>
                                            $( document ).ready(function()
                                            {
                                                qd_tranfer_parent_id(<?=$item->id?>);
                                            });
                                            </script>
                                            <?php } ?>
                                            &nbsp;
                                            <span id="cat_name_<?=$item->id?>"><?php echo $item->name; ?></span>
                                            <a onclick="return confirm_click();" href="<?php echo site_url('admin_menu/delete/'.$item->id); ?>" style="float: right;">X</a>
                                            
                                            <a href="<?php echo site_url('admin_menu/edit/'.$item->id); ?>" style="float: right; margin-right: 20px;" >Edit</a>
                                            <a href="<?php echo site_url('admin_menu/move_up/cat_id/'.$item->id.'/view_mode/'.$view_mode); ?>" style="float: right; margin-right: 20px;" >Up</a>
                                            
                                        </label>
                                    </li>
                                    <?php
                                    endforeach;
                                    ?>
                                    <script language="javascript">
                                        function qd_tranfer_parent_id($id)
                                        {
                                            $("#menu_parent_id").val($id);
                                            //alert($("#menu_parent_id").val());
                                        }
                                        
                                    </script>
                                    
                                </ul>
                            </fieldset>
                            
                        </form>

                     </div> <!-- End .module-body -->
                </div> <!-- End .module -->
                <div style="clear:both;"></div>
            </div> <!-- End .grid_6 -->
            
            <!-- Category edit panel -->
            <div class="grid_6">
                <!-- Notification boxes -->
                
                <div class="module" id="qd_add_or_update">
                     <h2><span>Add or update</span></h2>
                        <style type="text/css">
                        .module-body #menu_detail label{
                            float: left; width: 120px;
                        }
                        </style>
                     <div class="module-body">
                        <span class="notification n-success" <?php if(!in_array('edit_ok',$state)) echo 'style="display:none;"'; ?>>Updated successfully!</span>
                        <form action="<?php echo site_url('admin_menu/submit'); ?>" method="post" id="menu_detail">
                            <fieldset>
                                <script>
                                
                                function qd_validate()
                                {
                                    //get alt of selected option
                                    $selector = $("#menu_provider_id option:selected").attr("chooseable");
                                    if($selector==1 || $selector=="1")
                                    {
                                        $("#qd_choose_").css("display","inline-block");
                                    }
                                    else
                                    {
                                        $("#qd_choose_").css("display","none");
                                    }
                                    return false;
                                }
                                function qd_clear_param()
                                {
                                    $("#menu_param").val("");
                                }
                                function qd_choose()
                                {
                                    //get alt of selected option
                                    $selector = $("#menu_provider_id option:selected").attr("alt");
                                    window.open($selector,'popuppage',
      'width=850,toolbar=1,resizable=1,scrollbars=yes,height=600,top=100,left=100');
                                }
                                function qd_menu_param(value)
                                {
                                    // this gets called from the popup window and updates the field with a new value
                                    document.getElementById("menu_param").value = value;
                                }
                                //notification
                                $( document ).ready(function() {
                                    qd_validate();
                                    //auto focus
                                    $("#menu_name").focus();
                                    qd_blink("#qd_add_or_update");
                                });
                                </script>
                                <input  id="menu_parent_id" name="menu_parent_id" type="hidden" value="-1"/>
                                <input id="menu_id" name="menu_id" type="hidden" value="<?=$menu0->id?>"/>
                                <label>Menu name:</label>
                                
                                <input class="input-medium" id="menu_name" value="<?=$menu0->get_name()?>" name="menu_name" type="text" style="width: 200px;"/>
                                
                                <br />
                                <br />
                                <label>Menu provider:</label>
                                <select style="width: 400px;" class="input-medium" id="menu_provider_id" name="menu_provider_id" onchange="qd_clear_param() ; return qd_validate()">
                                    <?php foreach($menu_provider_list as $item) { ?>
                                    <option value="<?=$item->id?>" alt="<?=site_url($item->selector_uri) ?>" <?php if($item->selector_uri!='') echo 'chooseable="1"'; else echo 'chooseable="0"'; ?> <?php if($menu0->get_menu_provider_obj()!=null && $menu0->get_menu_provider_obj()->id==$item->id) echo 'selected="selected"'; ?>>
                                    <?=$item->name?>
                                    </option>
                                    <?php } ?>
                                </select>
                                <div style="clear: both; height: 10px;"></div>
                                
                                <label>&nbsp;</label>
                                <input id="qd_choose_" class="submit-green" value="Choose item" type="button" onclick="qd_choose()" />
                                <br />
                                <br />
                                <label>Menu param:</label>
                                
                                <input id="menu_param" value="<?=$menu0->menu_param?>" name="menu_param" type="text" class="input-medium" style="width: 200px;" readonly="readonly"/>
                                
                                
                                <div style="clear: both; height: 10px;"></div>
                                <label>&nbsp;</label>
                                <input class="submit-green" type="submit" value="Done" />
                                <a name="cat_edit"></a>
                            </fieldset>
                        </form>

                        
                     </div> <!-- End .module-body -->
                </div> <!-- End .module -->
                <div style="clear:both;"></div>
            </div> <!-- End .grid_6 -->
            <div style="clear:both;"></div>
<?php
$this->load->view('admin/footer');
?>
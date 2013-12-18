<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('admin/header');
$page_current = $pagination->current_page;
$page_total = $pagination->total_page;
?>
            <div class="grid_12">
                
                <!-- Notification boxes -->
                <span class="notification n-success" style="display:none;">Success notification.</span>
                
                <span class="notification n-information" style="display:none;">Information notification.</span>
                
                <span class="notification n-attention" style="display:none;">Attention notification.</span>
                
                <span class="notification n-error" style="display:none;">Error notification.</span>
                
                
                <div class="bottom-spacing">
                    
                    <!-- Table records filtering -->
                    <label style="float: left; height: 26px;">Filter by category:</label>
                    <select class="input-short" onchange="javascript:cat_item_click(this)" style="float: left; margin-left: 10px;">
                    	<option value="-1" <?php if($cat_id==-1) echo 'selected="selected"'; ?>>(Tất cả)</option>
                        <?php
                            foreach($cat_list as $cat_obj):
                        ?>
                        <option value="<?=$cat_obj->id?>" <?php if($cat_obj->id==$cat_id) echo 'selected="selected"'; ?>><?php for($i=1;$i<=$cat_obj->level;$i++) { echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; } echo $cat_obj->name; ?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                    
                    <script type="text/javascript">
                        function cat_item_click(elm)
                        {
                            window.location = "<?=site_url('admin_posts/index/special/'.$special)?>/cat_id/"+elm.value+"/page/<?=$page_current?>"+"/view_mode/"+"<?=$view_mode?>";
                        }
                    </script>
                    
                    <!-- Button -->
                    <div class="float-left" style="margin-left: 20px;">
                        <a href="<?= site_url('admin_posts/add/special/'.$special.'/cat_id/'.$cat_id); ?>" class="button">
                        	<span>New post <img src="src/plus-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/plus-small.gif" width="12" height="9" alt="New post" /></span>
                        </a>
                    </div>
                    <div style="clear: both;"></div>
                    
                </div>
                
                
                <!-- Example table -->
                <div class="module">
                	<h2><span>Posts list</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <?php if($view_mode=='selector') { ?>
                                    <th style="width:4%"></th>
                                    <?php } ?>
                                    <th style="width:4%">ID</th>
                                    <th style="width:20%">Title</th>
                                    <th style="width:7%">Avatar</th>
                                    <th style="width:10%">Author</th>
                                    <th style="width:16%">Category</th>
                                    <th style="width:13%">Date created</th>
                                    <th style="width:13%">Date modified</th>
                                    <th style="width:4%">Active</th>
                                    <th>Function</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($list_post as $post):
                                ?>
                                <tr>
                                    <?php if($view_mode=='selector') { ?>
                                    <script>
                                    function qd_choose()
                                    {
                                        var rates = document.getElementsByName('qd_id[]');
                                        var rate_value;
                                        for(var i = 0; i < rates.length; i++){
                                            if(rates[i].checked){
                                                rate_value = rates[i].value;
                                                //call parent function
                                                window.opener.qd_menu_param(rate_value);
                                                window.close();
                                                return false;
                                            }
                                        }
                                        
                                        return false;
                                    }
                                    </script>
                                    <td>
                                    <input type="radio" name="qd_id[]" value="<?=$post->id; ?>" />
                                    </td>
                                    <?php }?>
                                    <td class="align-center">            
                                    <?= $post->id; ?>
                                    </td>
                                    <td><a href="<?= site_url('admin_posts/edit/post_id/'.$post->id.'/special/'.$post->special.'/cat_id/'.$cat_id); ?>"><?= $post->title; ?>&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
                                    <td>
                                        <?php if($post->get_avatar_thumb()!='') :?>
                                        
                                        <img src="<?=$post->get_avatar_thumb()?>" style="max-width: 70px; max-height: 70px;" />
                                        <?php endif; ?>
                                    </td>
                                    <td><?php if($post->get_user_obj()!=null)
                                        echo $post->get_user_obj()->username;
                                     ?>
                                    
                                    </td>
                                    <td><?php 
                                        echo $post->get_cat_list_text();
                                        ?></td>
                                    <td><?= $post->date_create; ?></td>
                                    <td><?= $post->date_modify; ?></td>
                                    <td style="<?php if($post->active!=1) echo 'color: red;'; else echo 'color: blue;' ?>"><?= $post->active==1?'Yes':'No'; ?></td>
                                    <td>
                                        <!--
                                        <a href="<?= site_url('admin_posts/edit/post_id/'.$post->id.'/special/'.$post->special.'/cat_id/'.$cat_id); ?>"><img src="src/balloon.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/balloon.gif" width="16" height="16" alt="view comments" /></a>
                                        -->
                                        &nbsp;&nbsp;
                                        <a href="<?= site_url('admin_posts/edit/post_id/'.$post->id.'/special/'.$post->special.'/cat_id/'.$cat_id); ?>"><img src="src/pencil.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/pencil.gif" width="16" height="16" alt="edit" /></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a onclick="return confirm_click('<?=site_url('admin_posts/delete/post_id/'.$post->id.'/cat_id/'.$cat_id.'/page/'.$page_current.'/special/'.$special); ?>');" href="javascript:void(0)"><img src="src/bin.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/bin.gif" width="16" height="16" alt="delete"/></a>
                                        
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        </form>
                        <div class="pager" id="pager" style="width: 600px;">
                            <form action="">
                                
                                <div>
                                <span <?php if($view_mode!='selector') echo 'style="display: none;"' ?>>
                                <input class="submit-green" type="button" value="Choose" onclick="return qd_choose()">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                </span>
                                <img class="first" src="src/arrow-stop-180.gif" alt="first"/>
                                <img class="prev" src="src/arrow-180.gif" alt="prev"/> 
                                <input type="text" class="pagedisplay input-short align-center"/>
                                <img class="next" src="src/arrow.gif" alt="next"/>
                                <img class="last" src="src/arrow-stop.gif" alt="last"/> 
                                <select class="pagesize input-short align-center">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40" selected="selected">40</option>
                                </select>
                                
                                </div>
                            </form>
                        </div>
                        <div class="table-apply" style="display: none;">
                            <form action="">
                            <div>
                            <span>Apply action to selected:</span> 
                            <select class="input-medium">
                                <option value="1" selected="selected">Select action</option>
                                <option value="2">Publish</option>
                                <option value="3">Unpublish</option>
                                <option value="4">Delete</option>
                            </select>
                            </div>
                            </form>
                        </div>
                        <div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->
                
                
                <div class="pagination">           
                    <?php if($pagination->can_first_page==true) {
                        ?>
                        <a href="<?=site_url('admin_posts/index/cat_id/'.$cat_id.'/special/'.$special.'/view_mode/'.$view_mode.'/page/1'); ?>" class="button"><span>First <img src="src/arrow-stop-180-small.gif" height="9" width="12" alt="First" /></span></a>
                        <?php
                        }
                    ?>
                    <?php if($pagination->can_prev_page==true) {
                        ?>
                        <a href="<?=site_url('admin_posts/index/cat_id/'.$cat_id.'/special/'.$special.'/view_mode/'.$view_mode.'/page/'.($pagination->current_page-1)); ?>" class="button"><span>Prev <img src="src/arrow-180-small.gif" height="9" width="12" alt="Prev" /></span></a>
                        <?php
                        }
                    ?>
                    
                    <div class="numbers">
                        <?= $pagination->generate_link(10) ?>
                    </div>
                    <?php if($pagination->can_next_page==true) {
                        ?>
                        <a href="<?=site_url('admin_posts/index/cat_id/'.$cat_id.'/special/'.$special.'/view_mode/'.$view_mode.'/page/'.($pagination->current_page+1)); ?>" class="button"><span>Next <img src="src/arrow-000-small.gif" height="9" width="12" alt="Next" /></span></a>
                        <?php
                        }
                    ?>
                    <?php if($pagination->can_last_page==true) {
                        ?>
                        <a href="<?=site_url('admin_posts/index/cat_id/'.$cat_id.'/special/'.$special.'/view_mode/'.$view_mode.'/page/'.($pagination->total_page)); ?>" class="button"><span>Last <img src="src/arrow-stop-000-small.gif" height="9" width="12" alt="Last" /></span></a>
                        <?php
                        }
                    ?>
                    <div style="clear: both;"></div> 
                    
                </div>
                
                

                
			</div> <!-- End .grid_12 -->
                
            
            
            
            <div style="clear:both;"></div>
            

<?php
$this->load->view('admin/footer');
?>
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//registered varibles
//$order_list array
//$pagination Qd_pagination
$this->load->view('admin/header');
$page_current = $pagination->current_page;
$page_total = $pagination->total_page;
?>

            <div class="bottom-spacing" style="margin-left: 10px;">
                
                    <!-- Button -->
                    <div class="float-left">
                        <a href="<?=site_url($_com.'groups/add')?>" class="button">
                        	<span>New group <img src="src/plus-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/plus-small.gif" width="12" height="9" alt="New group"></span>
                        </a>
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
                	<h2><span>Groups list</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:4%">ID</th>
                                    <th style="width: 30%;">Name</th>
                                    <th >Description</th>
                                    <th style="width: 5%;">Function</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($group_list as $obj):
                                ?>
                                <tr>                                    
                                    <td class="align-center"><?=$obj->id; ?></td>
                                    <td><a href="<?=site_url($_com.'groups/edit/'.$obj->id)?>"><?=$obj->name; ?></a></td>
                                    <td><?=$obj->description; ?></td>
                                    <td>
                                    	<!-- <input type="checkbox" /> -->
                                        <!-- <a href=""><img src="src/tick-circle.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/tick-circle.gif" width="16" height="16" alt="published" /></a> -->
                                        <a href="<?=site_url($_com.'groups/edit/'.$obj->id); ?>"><img src="src/pencil.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/pencil.gif" width="16" height="16" alt="edit" /></a>
                                        <!-- <a href="<?=site_url($_com.'groups/edit/'.$obj->id); ?>"><img src="src/balloon.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/balloon.gif" width="16" height="16" alt="comments" /></a> -->
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        </form>
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
                        <div class="table-apply">
                            
                        </div>
                        <div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->
                
                
                <div class="pagination">           
                    <?php if($pagination->can_first_page==true) {
                        ?>
                        <a href="<?=site_url($_com.'groups/index/page/1'); ?>" class="button"><span>First <img src="src/arrow-stop-180-small.gif" height="9" width="12" alt="First" /></span></a>
                        <?php
                        }
                    ?>
                    <?php if($pagination->can_prev_page==true) {
                        ?>
                        <a href="<?=site_url($_com.'groups/index/page/'.($pagination->current_page-1)); ?>" class="button"><span>Prev <img src="src/arrow-180-small.gif" height="9" width="12" alt="Prev" /></span></a>
                        <?php
                        }
                    ?>
                    
                    <div class="numbers">
                        <?=$pagination->generate_link(10) ?>
                    </div>
                    <?php if($pagination->can_next_page==true) {
                        ?>
                        <a href="<?=site_url($_com.'groups/index/page/'.($pagination->current_page+1)); ?>" class="button"><span>Next <img src="src/arrow-000-small.gif" height="9" width="12" alt="Next" /></span></a>
                        <?php
                        }
                    ?>
                    <?php if($pagination->can_last_page==true) {
                        ?>
                        <a href="<?=site_url($_com.'groups/index/page/'.($pagination->total_page)); ?>" class="button"><span>Last <img src="src/arrow-stop-000-small.gif" height="9" width="12" alt="Last" /></span></a>
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
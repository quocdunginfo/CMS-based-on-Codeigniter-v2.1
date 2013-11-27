<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('header.php');
?>
            <div class="grid_12">
                
                <!-- Example table -->
                <div class="module">
                	<h2><span>Sample table</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:4%">ID</th>
                                    <th style="width:15%">Title</th>
                                    <th style="width:30%">Content</th>
                                    <th style="width:10%">Author</th>
                                    <th style="width:13%">Date created</th>
                                    <th style="width:13%">Date modified</th>
                                    <th style="width:4%">Active</th>
                                    <th>Function</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($cmt_list as $cmt):
                                ?>
                                <tr>
                                    <td class="align-center"><?php echo $cmt->id; ?></td>
                                    <td><a href="<?php echo site_url('admin_comments/edit/'.$cmt->id); ?>"><?php echo $cmt->title; ?></a></td>
                                    <td><?=$cmt->content?></td>
                                    <td>
                                        <a title="[Email]: <?=$cmt->guest_email?>" href="mailto:<?=$cmt->guest_email?>">
                                            <?php
                                            if($cmt->user_id<=0)
                                            {
                                                echo '[GUEST] '.$cmt->guest_name;
                                            }
                                            else
                                            {
                                                echo $cmt->user_id_obj->username;
                                            }
                                            
                                            ?>
                                        </a>
                                    </td>
                                    <td><?php echo $cmt->date_create; ?></td>
                                    <td><?php echo $cmt->date_modify; ?></td>
                                    <td style="<?php if($cmt->active!=1) echo 'color: red;'; else echo 'color: blue;' ?>"><?php echo $cmt->active==1?'Yes':'No'; ?></td>
                                    <td>
                                    	<!-- <input type="checkbox" /> -->
                                        <!-- <a href=""><img src="src/tick-circle.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/tick-circle.gif" width="16" height="16" alt="published" /></a> -->
                                        <a href="<?php echo site_url('admin_comments/edit/'.$cmt->id); ?>"><img src="src/pencil.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/pencil.gif" width="16" height="16" alt="edit" /></a>
                                        <!-- <a href="<?php echo site_url('admin_posts/edit/'.$post->id); ?>"><img src="src/balloon.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/balloon.gif" width="16" height="16" alt="comments" /></a> -->
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a onclick="return confirm_click();" href="<?php echo site_url('admin_comments/delete/'.$cmt->id.'/'.$post->id.'/'.$page_current); ?>"><img src="src/bin.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/bin.gif" width="16" height="16" alt="delete"/></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <script language="javascript">
                                    function confirm_click() {
                                        if (confirm("Are you sure to do this task ?")) {
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    }
                                </script>
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
                                    <option value="10" selected="selected">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                </select>
                                </div>
                            </form>
                        </div>
                        <div class="table-apply">
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
                    <a href="<?php echo site_url('admin_comments/index/'.$post->id.'/1'); ?>" class="button"><span><img src="src/arrow-stop-180-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-180-small.gif" height="9" width="12" alt="First" /> First</span></a> 
                    <a href="<?php echo site_url('admin_comments/index/'.$post->id.'/'.($page_current-1<1?1:$page_current-1)); ?>" class="button"><span><img src="src/arrow-180-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-180-small.gif" height="9" width="12" alt="Previous" /> Prev</span></a>
                    <div class="numbers">
                        <span>Page:</span>
                        <a href=""><?php echo $page_current; ?>/<?php echo $page_total; ?></a> 
                        <!-- do not use any more
                            <a href="">2</a> 
                            <span>|</span> 
                            <span class="current">3</span> 
                            <span>|</span> 
                            <a href="">4</a> 
                            <span>|</span> 
                            <a href="">5</a> 
                            <span>|</span> 
                            <a href="">6</a> 
                            <span>|</span> 
                            <a href="">7</a> 
                            <span>|</span> 
                            <span>...</span> 
                            <span>|</span> 
                            <a href="">99</a>
                        -->
                    </div> 
                    <a href="<?php echo site_url('admin_comments/index/'.$post->id.'/'.($page_current+1>$page_total?$page_total:$page_current+1)); ?>" class="button"><span>Next <img src="src/arrow-000-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-000-small.gif" height="9" width="12" alt="Next" /></span></a> 
                    <a href="<?php echo site_url('admin_comments/index/'.$post->id.'/'.$page_total); ?>" class="button last"><span>Last <img src="src/arrow-stop-000-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-000-small.gif" height="9" width="12" alt="Last" /></span></a>
                    <div style="clear: both;"></div> 
                </div>
                
                

                
			</div> <!-- End .grid_12 -->
                
            
            
            
            <div style="clear:both;"></div>
            

<?php
require_once('footer.php');
?>
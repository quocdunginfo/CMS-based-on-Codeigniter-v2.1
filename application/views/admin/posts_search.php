<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('header.php');
?>
            <div class="grid_12">
                
                <!-- Notification boxes -->
                <span class="notification n-success" style="display:none;">Success notification.</span>
                
                <span class="notification n-information" style="display:none;">Information notification.</span>
                
                <span class="notification n-attention" style="display:none;">Attention notification.</span>
                
                <span class="notification n-error" style="display:none;">Error notification.</span>
                
                
                <div class="bottom-spacing">
                
                    <!-- Button -->
                    <div class="float-right">
                        <a href="<?php echo site_url($_com.'posts/add/'.$special); ?>" class="button">
                        	<span>New Article <img src="src/plus-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/plus-small.gif" width="12" height="9" alt="New article" /></span>
                        </a>
                    </div>
                    
                    <!-- Table records filtering -->
                    <!--
                    Filter by category: 
                    <select class="input-short" onchange="javascript:cat_item_click(this)">
                    	<option value="-1" <?php if($cat_id==-1) echo 'selected="selected"'; ?>>(Tất cả)</option>
                        <?php
                            foreach($cat_list as $cat_obj):
                        ?>
                        <option value="<?=$cat_obj->id?>" <?php if($cat_obj->id==$cat_id) echo 'selected="selected"'; ?>><?php for($i=1;$i<=$cat_obj->level;$i++) { echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'; } echo $cat_obj->name.' ('.$cat_obj->count_post_recursive(-1,$special).')'; ?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                    <br />
                    <br />
                    -->
                    <form action="<?=site_url($_com.'posts/search_submit')?>" method="post">
                        Art ID
                        <input type="text" class="input-medium" name="s_art_id" value="<?=$s_art_id?>" style="width: 100px; "/>
                        Title
                        <input type="text" class="input-medium" name="s_title" value="<?=$s_title?>" style="width: 300px; "/>
                        
                        <input type="submit" value="Search" class="submit-green"/>
                    </form>
                    <script type="text/javascript">
                        function cat_item_click(elm)
                        {
                            window.location = "<?=site_url($_com.'posts/index/')?>/"+elm.value+"/<?=$page_current?>/<?=$special?>";
                        }
                    </script>
                    
                </div>
                
                
                <!-- Example table -->
                <div class="module">
                	<h2><span>Sample table</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:4%">ID</th>
                                    <th style="width:20%">Title</th>
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
                                    <td class="align-center"><?php echo $post->id; ?></td>
                                    <td><a href="<?php echo site_url($_com.'posts/edit/'.$post->id); ?>"><?php echo $post->title; ?></a></td>
                                    <td <?php if($post->user_id_obj!=null && $post->user_id_obj->group_id==0) echo 'style="color: red;"'; ?>><?php if($post->user_id_obj!=null) echo $post->user_id_obj->username; else echo '(null)'; ?></td>
                                    <td><?php 
                                        echo $post->get_cat_list_text();
                                        ?></td>
                                    <td><?php echo $post->date_create; ?></td>
                                    <td><?php echo $post->date_modify; ?></td>
                                    <td style="<?php if($post->active!=1) echo 'color: red;'; else echo 'color: blue;' ?>"><?php echo $post->active==1?'Yes':'No'; ?></td>
                                    <td>
                                        <a href="<?php echo site_url($_com.'comments/index/'.$post->id); ?>"><img src="src/balloon.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/balloon.gif" width="16" height="16" alt="view comments" /></a>
                                        &nbsp;&nbsp;
                                        <a href="<?php echo site_url($_com.'posts/edit/'.$post->id); ?>"><img src="src/pencil.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/pencil.gif" width="16" height="16" alt="edit" /></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a onclick="return confirm_click();" href="<?php echo site_url($_com.'posts/delete/'.$post->id.'/'.$cat_id.'/'.$page_current.'/'.$special); ?>"><img src="src/bin.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/bin.gif" width="16" height="16" alt="delete"/></a>
                                        
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
                    <a href="<?php echo site_url($_com.'posts/search/1/'.$special); ?>" class="button"><span><img src="src/arrow-stop-180-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-180-small.gif" height="9" width="12" alt="First" /> First</span></a> 
                    <a href="<?php echo site_url($_com.'posts/search/'.($page_current-1<=0?1:$page_current-1).'/'.$special); ?>" class="button"><span><img src="src/arrow-180-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-180-small.gif" height="9" width="12" alt="Previous" /> Prev</span></a>
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
                    <a href="<?php echo site_url($_com.'posts/search/'.($page_current+1>$page_total?$page_total:$page_current+1).'/'.$special); ?>" class="button"><span>Next <img src="src/arrow-000-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-000-small.gif" height="9" width="12" alt="Next" /></span></a> 
                    <a href="<?php echo site_url($_com.'posts/search/'.$page_total.'/'.$special); ?>" class="button last"><span>Last <img src="src/arrow-stop-000-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-000-small.gif" height="9" width="12" alt="Last" /></span></a>
                    <div style="clear: both;"></div> 
                </div>
                
                

                
			</div> <!-- End .grid_12 -->
                
            
            
            
            <div style="clear:both;"></div>
            

<?php
require_once('footer.php');
?>
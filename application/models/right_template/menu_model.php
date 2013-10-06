<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }
    public function generate($root_cat_id=-1,$special=0)
    {
        //get category object tree with level calculated
        $cat_model = new Cat_model;
        $cat_tree_obj = $cat_model->get_cat_tree_object($root_cat_id,0,$special,$pre_path='category/view/');
        //generating
        $html_output = '';
        
        $open = 
        '
        <div class="dd-holder">
        	<div class="dd-t"></div>
        	<div class="dd">
        		<ul>	    
        ';
        $close = 
        '
                </ul>
        		<div class="cl">&nbsp;</div>
        	</div>
        	<div class="dd-b"></div>
        </div>	    
        ';
        $length=sizeof($cat_tree_obj);
        $level = -1;
        for($i=0;$i<$length;$i++)
        {
            $cat_obj = $cat_tree_obj[$i];
            $cat_obj_next = $i+1==$length?null:$cat_tree_obj[$i+1];
            //gia lap next obj to prevent null
            if($cat_obj_next==null)
            {
                $cat_obj_next = new Cat_model;
                $cat_obj_next->level = $cat_obj->level-1;
            }
            
            //neu la dang tang level
            if($level+1==$cat_obj->level)
            {
                $html_output.=$open;
            }
            //neu la dang giang level
            else if($level-1==$cat_obj->level)
            {
                $html_output.=$close;
            }
            
            //define class item in same level have class="last"
            $class_last = '';
            //neu la final item in array or last item in same level
            if($i==$length || $cat_obj_next->level+1==$cat_obj->level)
            {
                //$class_last=' class="last"';
            }
            $url_link = site_url($pre_path.$cat_obj->id.'/1/'.$cat_obj->title_for_url);
            $cat_name = $cat_obj->name.' ('.$this->Post_model->count_by_cat_recursive($cat_obj->id,1,$cat_obj->special).')';
            //add current obj to output
            //neu current obj dong cap level voi next obj
            if($cat_obj->level==$cat_obj_next->level)
            {
                $html_output.=
                '
                <li'.$class_last.'><a href="'.$url_link.'">'.$cat_name.'</a></li>
                ';
            }
            //neu current obj khac cap level voi next obj (tang cap)
            else if($cat_obj->level+1==$cat_obj_next->level)
            {
                $html_output.=
                '
                <li'.$class_last.'><a href="'.$url_link.'">'.$cat_name.'</a>
                ';
            }
            //neu current obj khac cap level voi next obj (giang cap) - last item in level
            else if($cat_obj->level==$cat_obj_next->level+1)
            {
                $html_output.=
                '
                <li'.$class_last.'><a href="'.$url_link.'">'.$cat_name.'</a></li>
                ';
            }
            
            //set lai level
            $level = $cat_obj->level;
            
            //check last item in array
            if($i+1==$length)
            {
                //last item in array
                
                //build rest part
                for($j=$level;$j>=0;$j--)
                {
                    $html_output.=$close;
                }
                //finish
                break;
            }
        }
        
        return $html_output;
    }
}
?>
<?php
/*
<!--
<div class="dd-holder">
	<div class="dd-t"></div>
	<div class="dd">
		<ul>
		    <li><a href="#">Sub Level 1</a></li>
		    <li><a href="#">Sub Level 1</a>
		    	<div class="dd-holder">
		    		<div class="dd-t"></div>
		    		<div class="dd">
		    			<ul>
		    			    <li><a href="#">Sub Level 2</a></li>
		    			    <li><a href="#">Sub Level 2</a></li>
		    			    <li class="last"><a href="#">Sub Level 2</a>
		    			    	<div class="dd-holder">
						    		<div class="dd-t"></div>
						    		<div class="dd">
						    			<ul>
						    			    <li><a href="#">Sub Level 3</a></li>
						    			    <li><a href="#">Sub Level 3</a></li>
						    			    <li class="last"><a href="#">Sub Level 3</a>
						    			    	
						    			    </li>
						    			</ul>
						    			<div class="cl">&nbsp;</div>
						    		</div>
						    		<div class="dd-b"></div>
						    	</div>
		    			    </li>
		    			</ul>
		    			<div class="cl">&nbsp;</div>
		    		</div>
		    		<div class="dd-b"></div>
		    	</div>
			    	
		    </li>
		    <li><a href="#">Sub Level 1</a></li>
		    <li><a href="#">Sub Level 1</a></li>
		    <li class="last"><a href="#">Sub Level 1</a></li>
		</ul>
		<div class="cl">&nbsp;</div>
	</div>
	<div class="dd-b"></div>
</div>
-->
*/
?>
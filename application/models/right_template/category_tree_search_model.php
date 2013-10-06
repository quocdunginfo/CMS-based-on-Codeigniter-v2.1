<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category_tree_search_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }
    public function generate($root_cat_id=-1,$special=0,$pre_path='category/index/',$active_cat=array(),$pre_path_active_cat='category/index/',$suffix='#post_view')
    {
        //get cat tree
        $html_output = '';
        $html_output.='<ul>';
        //get cat tree
        $cat_list = $this->Cat_model->get_cat_tree_object($root_cat_id,0,$special);
        //build
        foreach($cat_list as $cat_obj)
        {
            $class = '';
            if(in_array($cat_obj->id,$active_cat))
            {
                $class = ' class="qd_cat_active"';
            }
            $html_output.='<li>';
            for($i=0;$i<$cat_obj->level;$i++)
            {
                $html_output.= '&nbsp;&nbsp;&nbsp;';
            }
            //
            $checked='';
            if(in_array($cat_obj->id,$active_cat))
            {
                $checked = 'checked="checked"';
            }
            $html_output.='<input type="checkbox" name="category_list[]" value="'.$cat_obj->id.'" style="margin-right:10px;" '.$checked.'/>';
            $pre_path_tmp = $pre_path;
            if(in_array($cat_obj->id,$active_cat))
            {
                $pre_path_tmp = $pre_path_active_cat;
            }
            $html_output.='<a href="';
            $html_output.=site_url($pre_path_tmp.$cat_obj->id.'/1/'.$cat_obj->title_for_url).$suffix;
            $html_output.='"'.$class.'>';           
            
            $html_output.=$cat_obj->name;
            
            $html_output.=' ('.$cat_obj->count_post_recursive(1,-1).')';
            
            if(in_array($cat_obj->id,$active_cat))
            {
                $html_output.='&nbsp;&nbsp;&#10003;';
            }
            
            $html_output.='</a>';
            
            $html_output.='</li>';
        }
        return $html_output;
    }
}
/*
<ul>
	<?php
    foreach($painting_category as $cat_obj):
    ?>
    <li><a href="<?=site_url('category/index/'.$cat_obj->id.'/1/'.$cat_obj->title_for_url)?>"><?=$cat_obj->name?> (<?=$cat_obj->count_post_recursive(1,-1)?>)</a></li>
    <?php endforeach; ?>
</ul>
*/
?>
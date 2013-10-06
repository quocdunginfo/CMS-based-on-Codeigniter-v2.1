<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category_tree_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }
    public function generate($root_cat_id=-1,$special=0,$pre_path='category/index/',$active_cat=array(),$suffix='#post_view')
    {
        //get cat tree
        $html_output = '';
        $html_output.='<ul>';
        //get cat tree
        $cat_list = $this->Cat_model->get_cat_tree_object($root_cat_id,0,$special);
        //build
        foreach($cat_list as $cat_obj)
        {
            $class='';
            if(in_array($cat_obj->id,$active_cat))
            {
                $class=' class="qd_cat_active"';
            }
            $html_output.='<li>';
            $html_output.='<a href="';
            $html_output.=site_url($pre_path.$cat_obj->id.'/1/'.$cat_obj->title_for_url).$suffix;
            $html_output.='"'.$class.'>';
            
            $name=$cat_obj->name;
            for($i=0;$i<$cat_obj->level;$i++)
            {
                $name = '&nbsp;&nbsp;&nbsp;'.$name;
            }
            $html_output.=$name;
            
            $html_output.=' ('.$cat_obj->count_post_recursive(1,-1).')';
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
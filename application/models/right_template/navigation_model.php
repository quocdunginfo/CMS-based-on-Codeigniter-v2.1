<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Navigation_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('url');
    }
    public function generate($base_url='', $page_current=1, $page_total=1, $suffix='#post_view')
    {
        $html_output='';
        if($page_current!=1)
        {
            $html_output.='<a href="'.$base_url.'/1'.$suffix.'" class="page">first</a>';
            $html_output.='<a href="'.$base_url.'/'.($page_current-1<1?1:$page_current-1).$suffix.'" class="page">prev</a>';
        }
        $i=0;
        for($i=$page_current-3;$i<=$page_current+3;$i++)
        {
            if($i<=0) continue;
            if($i>$page_total) break;            
            $active='';
            if($page_current==$i) $active=' active';
            $html_output.='<a href="'.$base_url.'/'.$i.$suffix.'" class="page'.$active.'">'.$i.'</a>';
        }
        //che them ... de biet la chua phai tan cung
        if($i<=$page_total)
        {
            $html_output.='<span href="" class="page">...</span>';
        }
        if($page_current!=$page_total)
        {
            $html_output.='<a href="'.$base_url.'/'.($page_current+1>$page_total?$page_total:$page_current+1).$suffix.'" class="page">next</a>';
            $html_output.='<a href="'.$base_url.'/'.$page_total.$suffix.'" class="page">last</a>';
        }
        return $html_output;
    }
}
?>
<?php
/*
<a href="<?php echo site_url('category/view/'.$cat_id.'/1'); ?>" class="page">first</a>
<a href="<?php echo site_url('category/view/'.$cat_id.'/'.($page_current-1<1?1:$page_current-1)); ?>" class="page">prev</a>

<a href="<?=site_url('category/view/'.$cat_id.'/'.$page_current)?>" class="page active"><?=$page_current?>/<?=$page_total?></a>

<a href="<?php echo site_url('category/view/'.$cat_id.'/'.($page_current+1>$page_total?$page_total:$page_current+1)); ?>" class="page">next</a>
<a href="<?php echo site_url('category/view/'.$cat_id.'/'.$page_total); ?>" class="page">last</a>
*/
?>
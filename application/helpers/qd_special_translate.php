<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('qd_special_post_to_cat'))
{
	function qd_special_post_to_cat($special=0)
	{
		//0: normal post, 1: special post, 2: painting post, 3: menuitem, 4: order_detail
        //0: normal cat, 1: system cat, 2: th? lo?i tranh, 3: ch?t li?u tranh, 4: menu, 5: product order
        switch ($special)
        {
            case 0: return 0;
            case 1: return 1;
            case 2: return 2;
            case 3: return 4;
            case 4: return 5;
        }
        return -1;
	}
}
if ( ! function_exists('qd_special_cat_to_post'))
{
    function qd_special_cat_to_post($special=0)
	{
        switch ($special)
        {
            case 0: return 0;
            case 1: return 1;
            case 2: return 2;
            case 3: return 2;
            case 4: return 3;
            case 5: return 4;
        }
        return -1;
	}    
}
?>
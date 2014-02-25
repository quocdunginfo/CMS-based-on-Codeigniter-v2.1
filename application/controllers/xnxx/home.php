<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/libraries/simple_html_dom.php');
class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('xnxx/Qd_xnxx', 'Qd_xnxx');
        //self::_build_common_data();
    }
    public function redirect_play()
    {
        $url = $this->input->get('url', true);
        $obj = self::get_xnxx_obj($url);
        
        redirect('redirect/index?url='.urlencode($obj->low_3gp));
    }
    public function index()
    {
        $url = 'http://xnxx.com';
        $list = self::fetch_home_page($url);
        
        foreach($list as $item)
        {
            ?>
            <div style="float: left; width: 200px; height: 250px;">
                <a href="<?=site_url('xnxx/home/redirect_play?url='.$item->raw_url)?>">
                    <img src="<?=$item->avarta?>" width="200px" ></img>
                    <br />
                    <?=$item->title?>
                </a> 
                <br />
            </div>
            
            <?php
        }
    }
    public function _get_html_mobile($url='http://xnxx.com')
    {
        $header_agent = 'User-Agent: Mozilla/5.0 (iPhone; U; CPU iPhone OS 3_0 like Mac OS X; en-us) AppleWebKit/528.18 (KHTML, like Gecko) Version/4.0 Mobile/7A341 Safari/528.16';
        $context = stream_context_create(array('http' => array(
            'header' => $header_agent)));
        $html = str_get_html( file_get_contents($url, false, $context) );
        return $html;        
    }
    /**
     * Xnxx::fetch_home_page()
     * Lấy array các Qd_xnxx từ trang GRID
     * @param string $raw_url_home
     * @return void
     */
    public function fetch_home_page($raw_url_home='http://www.xnxx.com')
    {
        $obj = new Qd_xnxx;
        $re=array();
        
        $html = self::_get_html_mobile($raw_url_home);
        foreach($html->find('div[class=thumbs]') as $element)
        {
            foreach($element->find('li') as $li)
            {
                $obj=new Qd_xnxx;
                foreach($li->find('a[class=miniature]') as $item)
                {
                    $obj->raw_url = $item->href;
                    
                    foreach($item->find('img[class=borderxn]') as $img)
                    {
                        $obj->avarta = $img->src;
                        break;
                    }
                    break;
                }
                foreach($li->find('div[class=t_all]') as $title)
                {
                    foreach($title->find('span') as $span)
                    {
                        $obj->title = trim($span->plaintext);
                        break;
                    }
                    break;
                }
                array_push($re,$obj);
            }
            break;
        }
        return $re;
        //var_dump($re);
    }
    /**
     * Xnxx::get_xnxx_obj()
     * Lấy ra obj Qd_xnxx có link video từ URL detail (url xem video)
     * @param string $raw_url_detail
     * @return void
     */
    public function get_xnxx_obj($raw_url_detail='http://www.xnxx.com/video1553583/college_babe_reaches_a_screaming_orgasm')
    {
        $obj = new Qd_xnxx;
        $obj->raw_url = $raw_url_detail;
        
        $html = self::_get_html_mobile($raw_url_detail);
        foreach($html->find('title') as $element)
        {
            $obj->title = $element->plaintext;
            break;
        }
        foreach($html->find('script') as $element)
        {
            if(strstr($element->innertext(),'.mp4'))
            {
                $re = self::find_all_string_between_char($element,'\'');
                foreach($re as $item)
                {
                    if(strstr($item,'.mp4') && strstr($item,'/3gp/'))
                    {
                        $obj->low_3gp = $item;
                    }
                    if(strstr($item,'.mp4') && strstr($item,'/mp4/'))
                    {
                        $obj->high_mp4 = $item;
                    }
                    if(strstr($item,'.jpg') && strstr($item,'thumb'))
                    {
                        $obj->avarta = $item;
                    }
                }
                
                break;
            }
        }
        return $obj;
    }
    public function find_all_string_between_char($string='', $char='\'')
    {
        $re=array();
        while(strstr($string,$char))
        {
            $begin = strpos($string,$char);
            $string = substr($string,$begin+1);
            $end = strpos($string,$char);
            if($end<0) break;
            
            $tmp = substr($string,0,$end);
            if($tmp!='')
            {
                array_push($re,$tmp);
            }
            $string = substr($string,$end+1);
        }
        //var_dump($re);
        return $re;
    }
}
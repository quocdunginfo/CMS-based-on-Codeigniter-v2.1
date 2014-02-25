<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/libraries/simple_html_dom.php');
class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        //$this->output->cache(60);
        self::_build_common_data();
    }
    /*
    
    {"data": [{"link":"http:\/\/quocdung.net\/nct\/home\/listen_song_from_raw?url=http:\/\/www.nhaccuatui.com\/bai-hat\/h-dknight-ft-real-t-ft-swainz-lee.k1qy7qNR45.html","name":"H (Dk.night) (Real T) (Swainz Lee)"},{"link":"http:\/\/quocdung.net\/nct\/home\/listen_song_from_raw?url=http:\/\/www.nhaccuatui.com\/bai-hat\/h-alexis-jordan.LipJQa2mI5.html","name":"H (Alexis Jordan)"},{"link":"http:\/\/quocdung.net\/nct\/home\/listen_song_from_raw?url=http:\/\/www.nhaccuatui.com\/bai-hat\/h-hk-ft-duy.4k3sXdE2a2.html","name":"H (HK) (Duy)"}]}
    
    */
    public function api($function='find_by_song_name', $param='')
    {
        if($function=='find_by_song_name')
        {
            $url = site_url('nct/home/index?url=http://www.nhaccuatui.com/tim-kiem/bai-hat?q='.$param);
            $html = file_get_html($url);
            // Find all links 
            $array=array();
            
            foreach($html->find('a[class=song_info]') as $div) 
            {
                $song_info = array('link'=>'','name'=>'');
                $song_info['link'] = $div->href;
                $song_info['name'] = $div->plaintext;
                
                array_push($array, $song_info);
                
            }
            echo '{"data": '.json_encode($array).'}';
        }
        else
        {
            echo 'API not found!';
        }
    }
    public function test()
    {
        $context = stream_context_create(array('http' => array(
            'header' => 'User-Agent: Mozilla/5.0 (iPhone; U; CPU iPhone OS 3_0 like Mac OS X; en-us) AppleWebKit/528.18 (KHTML, like Gecko) Version/4.0 Mobile/7A341 Safari/528.16')));
        $html = str_get_html( file_get_contents('http://www.xnxx.com/video910931/best_squirts_compilation_1', false, $context) );
        //echo $html;
        foreach($html->find('script') as $element)
        {
            if(strstr($element->innertext(),'.mp4'))
            {
                foreach(self::getTextBetweenTags('script',$element) as $item)
                {
                    echo $item;//fail here
                }
                break;
            }
        }
    }
    public function search()
    {
        $key = $url = $this->input->get('key', true);
        $link = 'http://www.nhaccuatui.com/tim-kiem/bai-hat?q='.$key;
        $this->session->set_flashdata('key',$key);
        if($key=='')
        {
            $link='http://www.nhaccuatui.com/bai-hat/bai-hat-moi.html';
        }
        redirect('nct/home/index?url='.$link);
    }
    public function index()
    {
		$url = $this->input->get('url', true);
        $url = str_replace(' ', '+', $url);
        $url = str_replace('%20', '+', $url);
        
        if($url=='')
        {
            $url='http://www.nhaccuatui.com/bai-hat/bai-hat-moi.html';
        }
        // Create DOM from URL or file
        
        $html = file_get_html($url);
        

        //HTML
        ?>
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <title>Nhạc của tui - Lite edition</title>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            </head>
            <body>
        <?php
        //show combobox
        ?>
            <form action="<?=site_url('nct/home/search')?>" method="get">
                <input type="text" name="key" value="<?=$this->session->flashdata('key')?>" />
                <input name="submit" type="submit" value="search"/>
            </form>
        <?php
        
        // Find all links 
        foreach($html->find('div[class=info_song]') as $div) 
        {
            foreach($div->find('a[class=name_song]') as $song_name)
            {
                echo '<a class="song_info" href="'.site_url('nct/home/listen_song_from_raw?url='.$song_name->href).'">';
                echo $song_name->plaintext;
            }
            
            foreach($div->find('a[class=name_singer]') as $item)
            {
                echo ' ('.$item->plaintext.')';
            }            
            echo '</a>';
            echo '<br>';
        }
        //display navigation
        foreach($html->find('div[class=box_pageview]') as $div)
        {
            foreach($div->find('a') as $item)
            {
                
                echo '<a href="'.site_url('nct/home/index?url='.urlencode($item->href)).'">'.$item->plaintext.'</a>'.' | ';
            }
        }
        ?>
            <hr />
            <div class="author_info">
                Listen to music online at "Nhạc Của Tui" Server via aided-gate
                <br />
                quocdunginfo - support all common streaming player (cross-platform): Blackberry OS >= 4.5, Windows Phone >= 7, Windows >= XP, ...
            </div>
            </body>
            </html>
        <?php
    }
    protected function _view($view_name='index', $data = array())
    {
        
    }
    protected function _build_common_data()
    {
        
    }
    public function listen_song_from_raw($url='')
    {
        $url = $this->input->get('url', TRUE);
        
        redirect('redirect/index?url='.self::raw_to_stream($url));
    }
    //http://www.nhaccuatui.com/bai-hat/bay-cung-mua-xuan-yuki-huy-nam.w39TDrOe5iwP.html
    //=>
    //http://stream1.nixcdn.com/a327b6d75a82fc36c1cdd964d2b378fc/52c8ce23/NhacCuaTui847/BayCungMuaXuan-YukiHuyNam-2913597.mp3
    
    public function raw_to_stream($url='')//trả về stream từ html
    {
        $html = file_get_html($url);
        foreach($html->find('script') as $script)
        {
            if(strstr($script,'http://www.nhaccuatui.com/flash/xml?key1='))
            {
                $tmp = $script->innertext;
                $tmp = strstr($tmp,'http://www.nhaccuatui.com/flash/xml?key1=');
                //loai bo chuoi sau nhay kep " dau tien
                $index = strpos($tmp,'"');
                $song_meta_link = substr($tmp,0,$index);
                //hien thi link
                $stream_link = self::cdata_to_stream($song_meta_link);
                
                return $stream_link;
            }
        }
    }
    //http://www.nhaccuatui.com/flash/xml?key1=d72f769a1d8d0cd0abe0d9659f5f84b2
    //=>
    //http://stream1.nixcdn.com/a327b6d75a82fc36c1cdd964d2b378fc/52c8ce23/NhacCuaTui847/BayCungMuaXuan-YukiHuyNam-2913597.mp3
    public function cdata_to_stream($url='')//return stream mp3 link từ file CDATA
    {
        $html = file_get_html($url);
        foreach($html->find('location') as $location)
        {
            $tmp = $location->plaintext;
            $tmp = trim($tmp);
            $tmp = str_replace('<![CDATA[','',$tmp);
            $tmp = str_replace(']]>','',$tmp);
            return $tmp;
        }
    }
}
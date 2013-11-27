<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test3 extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Post_model");
        $this->load->model("Group_model");
        $this->load->model("Permission_model");
        $this->load->model("painting/Painting_post_model",'Painting_post_model');
        $this->load->model("Cat_model");
        $this->load->helper("url");
        $this->load->model("Setting_model");
    }
    public function index($page=1)
    {
        
        //pagination
        $this->load->library('Qd_pagination');
        $pagination = new Qd_pagination;
        $pagination->set_current_page($page);
        $pagination->set_max_item_per_page(19);
        $pagination->set_total_item(200);
        $pagination->set_base_url(site_url('test3/index/page/'));
        $pagination->update();
        
        echo 'start_point='.$pagination->start_point;
        echo 'count='.$pagination->max_item_per_page;
        echo 'total_page='.$pagination->total_page;
        echo '<br>'.$pagination->generate_link(4);
        /*
        $list = $this->Post_model->search('','','',-1,-1,null,false,-1,'post.title','desc');
        
        foreach($list as $post)
        {
            echo $post->id.' - '.$post->title;
            echo '<br>';
        }
        */
        //var_dump($list);
    }
}
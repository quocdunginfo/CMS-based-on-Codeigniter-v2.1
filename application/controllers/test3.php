<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test3 extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('doctrine');
    }
    public function index()
    {
        //$em = $this->doctrine->em;
        //$tool = new \Doctrine\ORM\Tools\SchemaTool($em);
        //$classes = array(
        //$em->getClassMetadata('Entities\Vd')
            //);
        //$tool->createSchema($classes);
        
        //$article = $em->find('Entities\Vd', 1);
    }
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'/models/cat_model.php' );
class Material_cat_model extends Cat_model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->special=3;
    }
    public function get_by_id($id=0)
    {
        $obj = new Material_cat_model;
        $obj->id = $id;
        if(!$obj->is_exist())
        {
            return null;
        }
        $obj->load();
        return $obj;
    }
}
?>
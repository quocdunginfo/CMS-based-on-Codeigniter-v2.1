<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Form_validate {
    public function is_email($text) {
        if (filter_var($text, FILTER_VALIDATE_EMAIL)!=false) {
            return true;
        }
        return false;
    }
    public function is_username($text) {
    
    
    }
    public function is_match($text1,$text2) {
    
    
    }
    public function is_number($text) {
    
    
    }
    public function is_url($text) {
    
    
    }
}

?>
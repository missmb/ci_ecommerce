<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category_Model extends CI_Model
{

    public function data_electronic()
    {
        return $this->db->get_where("product", array('category' => 'electronic'));
    }

    public function data_women()
    {
        return $this->db->get_where("product", array('category' => 'women'));
    }

    public function data_kids()
    {
        return $this->db->get_where("product", array('category' => 'kids'));
    }
    
    public function data_sport()
    {
        return $this->db->get_where("product", array('category' => 'sport'));
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function electronic()
    {
        $data['title'] = 'Category';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['electronic'] = $this->Category_Model->data_electronic()->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('category/electronic', $data);
        $this->load->view('template/footer', $data);
    }

    public function women()
    {
        $data['title'] = 'Category';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['women'] = $this->Category_Model->data_women()->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('category/women', $data);
        $this->load->view('template/footer', $data);
    }

    public function kids()
    {
        $data['title'] = 'Category';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kids'] = $this->Category_Model->data_kids()->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('category/kids', $data);
        $this->load->view('template/footer', $data);
    }

    public function sport()
    {
        $data['title'] = 'Category';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sport'] = $this->Category_Model->data_sport()->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('category/sport', $data);
        $this->load->view('template/footer', $data);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Product';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->Product_Model->get_product()->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('shop/dashboard', $data);
        $this->load->view('template/footer', $data);
    }

    public function add_to_cart($id)
    {
        $product = $this->Product_Model->find($id);

        $data = array(
            'id' => $product->id,
            'qty' => 1,
            'price' => $product->price,
            'name' => $product->name
        );

        // var_dump($data);die();
        $this->cart->insert($data);
        redirect('shop');
    }

    public function detail_cart()
    {
        $data['title'] = 'Cart';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->Product_Model->get_product()->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('shop/cart', $data);
        $this->load->view('template/footer', $data);
    }

    public function delete_cart()
    {
        $this->cart->destroy();
        redirect('shop');
    }

    public function payment()
    {
        $data['title'] = 'Payment';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->Product_Model->get_product()->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('shop/payment', $data);
        $this->load->view('template/footer', $data);
    }

    public function process() {
        $data['title'] = 'Payment';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $is_processed = $this->Invoice_Model->index();
        if($is_processed){
            $this->cart->destroy();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('shop/process_order', $data);
            $this->load->view('template/footer', $data);
        } else {
            echo "Sorry, Your Order is Failed to Process";
        }
    }
}

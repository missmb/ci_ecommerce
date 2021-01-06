<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function Role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('template/footer', $data);
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('template/footer', $data);
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Access Changed! </div>');
    }

    public function product()
    {
        $data['title'] = 'Product';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->Product_Model->get_product()->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/product', $data);
        $this->load->view('template/footer', $data);
    }

    public function invoice()
    {
    }

    public function addProduct(){
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $category = $this->input->post('category');
        $price = $this->input->post('price');
        $stock = $this->input->post('stock');
        $cover = $_FILES['cover']['name'];
        if($cover = ''){ }else{
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/product/';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('cover')){
                echo "error upload cover!"; die();
            }else {
                $cover = $this->upload->data('file_name');
            }
        }

        $data =array(
            'name' => $name,
            'description' => $description,
            'category' => $category,
            'price' => $price,
            'stock' => $stock,
            'cover' => $cover,
        );

        $this->Product_Model->save($data, 'product');
        redirect('shop');
    }
}

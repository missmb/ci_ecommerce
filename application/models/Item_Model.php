<?php 

defined('BASEPATH') or exit('No direct script access allowed');
 
class Item_Model extends CI_Model {
 
    public function getItem(){
        $result = $this->db->get('item');
        return $result;
    }

    function save($item_name,$item_price){
        $data = array(
          'item_name' => $item_name,
          'item_price' => $item_price
        );
        $this->db->insert('item',$data);
      }

    function delete(){
        $item_id = $this->uri->segment(3);
        $this->item_model->delete($item_id);
        redirect('item');
    }

    function get_edit(){
        $item_id = $this->uri->segment(3);
        $result = $this->item_model->get_item_id($item_id);
        if($result->num_rows() > 0){
            $i = $result->row_array();
            $data = array(
                'item_id'    => $i['item_id'],
                'item_name'  => $i['item_name'],
                'item_price' => $i['item_price']
            );
            $this->load->view('edit_item_view',$data);
        }else{
            echo "Data Was Not Found";
        }
      }
      function update(){
        $item_id = $this->input->post('item_id');
        $item_name = $this->input->post('item_name');
        $item_price = $this->input->post('item_price');
        $this->item_model->update($item_id,$item_name,$item_price);
        redirect('item');
      }
}
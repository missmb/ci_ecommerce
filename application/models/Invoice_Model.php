<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Invoice_Model extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $name = $this->input->post('name');
        $address = $this->input->post('address');

        $invoice = array(
            'name' => $name,
            'address' => $address,
            'date_order' => date('Y-m-d H:i:s'),
            'max_payment' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y')))
        );
        $this->db->insert('invoice', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $it) {
            $data = array(
                'id_invoice' => $id_invoice,
                'id_product' => $it['id'],
                'name' => $it['name'],
                'quantity' => $it['qty'],
                'price' => $it['price'],
            );
            $this->db->insert('tb_order', $data);
        }

        return TRUE;
    }

    public function show_data()
    {
        $result = $this->db->get('invoice');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    public function get_id_invoice($id_invoice)
    {
        $result = $this->db->where('id', $id_invoice)->limit(1)->get('invoice');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function get_id_order($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->get('tb_order');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}

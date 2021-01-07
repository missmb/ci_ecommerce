<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_Model extends CI_Model
{

  function get_product()
  {
    $result = $this->db->get('product');
    return $result;
  }

  function save($data, $table)
  {
    $this->db->insert($table, $data);
  }

  function edit($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  function update($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  function delete($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  function find($id)
  {
    $result = $this->db->where('id', $id)
      ->limit(1)
      ->get('product');

    if ($result->num_rows() > 0) {
      return $result->row();
    } else {
      return array();
    }
  }

  function detail_product($id_product)
  {
    $result = $this->db->where('id', $id_product)->get('product');
    if ($result->num_rows() > 0) {
      return $result->result();
    } else {
      return false;
    }
  }
}

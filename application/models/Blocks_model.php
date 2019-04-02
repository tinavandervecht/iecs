<?php
class Blocks_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_blocks($getSpecificBlockByID = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->order_by('products_id', 'asc');

        if ($getSpecificBlockByID != 'all' && $getSpecificBlockByID != null) {
            $this->db->where('products_id', $getSpecificBlockByID);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function delete_block($blockID)
    {
        $this->db->delete('tbl_products', array('products_id' => $blockID));
    }

    public function create_block()
    {
      $this->load->helper('url');

        $data = array(
            'product_name' => $this->input->post('product_name'),
            'product_number' => $this->input->post('product_number'),
            'product_b' => $this->input->post('product_b'),
            'product_bT' => $this->input->post('product_bT'),
            'product_hB' => $this->input->post('product_hB'),
            'product_W' => $this->input->post('product_W'),
            'product_Ws' => $this->input->post('product_Ws')
        );

        $this->db->insert('tbl_products', $data);
    }
}

<?php
class Blocks_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_blocks()
    {
        $this->db->select('*');
        $this->db->from('tbl_products');

        $query = $this->db->get();
        return $query->result_array();
    }
}

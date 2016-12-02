<?php
class Erosion_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_company()
        {

                        $query = $this->db->get('tbl_company');
                        return $query->result_array();
        }
}

<?php
class History_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_estimateHistory($companyID = FALSE)
        {

                      if($companyID === FALSE){
                        $query = $this->db->get('tbl_estimates');
                          return $query->result_array();
                      }

                      $this->db->select('*');
                      $this->db->from('tbl_company');
                      $this->db->join('tbl_estimates', 'tbl_company.company_id = tbl_estimates.company_id');
                      $this->db->where('tbl_company.company_id', $companyID);
                      $query = $this->db->get();
                      return $query->result_array();
        }
}

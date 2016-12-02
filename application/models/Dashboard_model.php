<?php
class Dashboard_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_company($companyID = FALSE)
        {

                      if($companyID === FALSE){
                        $query = $this->db->get('tbl_company');
                          return $query->result_array();
                      }

                      $query = $this->db->get_where('tbl_company', array('company_id' => $companyID));
                      return $query->row_array();
        }

        public function get_estimateHistory($companyID = FALSE)
        {

                      if($companyID === FALSE){
                          return false;
                      }

                      $this->db->select('*');
                      $this->db->from('tbl_company');
                      $this->db->join('tbl_estimates', 'tbl_company.company_id = tbl_estimates.company_id');
                      $this->db->where('tbl_company.company_id', $companyID);
                      $this->db->order_by('tbl_estimates.estimate_date', 'DESC');

                      $query = $this->db->get();
                      if($query -> num_rows() > 0){
                      return $query->result_array();
                    }
                      else {
                        return false;
                      }
        }
}

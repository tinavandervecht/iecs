<?php
class Admin_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function check_adminlogin(){

              $admin = $this->input->post('admin_user');
              $password = $this->input->post('admin_pw');
              $this -> db -> select('*');
              $this -> db -> from('tbl_admin');
              $this -> db -> where('admin_username', $admin);
              $this -> db -> where('admin_pw', $password);
              $this -> db -> limit(1);
              $query = $this -> db -> get();

              if($query -> num_rows() == 1){
                $data = array(
                  'admin_lastLogin' => time()
                );
                $this->db->update('tbl_admin', $data, "admin_id = 1");
                return $query->row_array();
              }
              else{
                return false;
              }
            }

            public function get_allEstimates($limit){

              $this->db->select('*');
              $this->db->from('tbl_company');
              $this->db->join('tbl_estimates', 'tbl_company.company_id = tbl_estimates.company_id');
              if (isset($limit)){
                $this->db->limit($limit);
              }
              $this->db->order_by('tbl_estimates.estimate_modifiedDate', 'DESC');

              $query = $this->db->get();
              return $query->result_array();
            }

            public function search_estimates($limit){

              $search = $this->input->post('search');
              $sort = $this->input->post('sort');

              $this->db->select('*');
              $this->db->from('tbl_company');
              $this->db->join('tbl_estimates', 'tbl_company.company_id = tbl_estimates.company_id');
              if (isset($search)) {
                $this->db->like('tbl_estimates.estimate_name', $search);
                $this->db->or_like('tbl_company.company_name', $search);
              }

              if (isset($sort)) {
                if ($sort=="1"){
                  $this->db->order_by('tbl_estimates.estimate_modifiedDate', 'DESC');
                }
                elseif ($sort=="3") {
                    $this->db->order_by('tbl_estimates.estimate_name', 'ASC');
                }
                elseif ($sort=="4") {
                    $this->db->order_by('tbl_estimates.estimate_name', 'DESC');
                }
                else{
                    $this->db->order_by('tbl_estimates.estimate_modifiedDate', 'ASC');
                }
              }
              else{
                $this->db->order_by('tbl_estimates.estimate_modifiedDate', 'DESC');
              }

              if (isset($limit)){
                $this->db->limit($limit);
              }

              $query = $this->db->get();

              if($query -> num_rows() == 0){
                return false;
              }
              else{
                return $query->result_array();
              }


            }
            public function search_companies($limit){

              $search = $this->input->post('search');
              $sort = $this->input->post('sort');

              $this->db->select('*');
              $this->db->from('tbl_company');
              $this->db->like('company_name', $search);
              if (isset($search)) {
                $this->db->or_like('company_contactName', $search);
                $this->db->or_like('company_email', $search);
              }

              if (isset($sort)) {
                if ($sort=="1"){
                  $this->db->order_by('company_date', 'DESC');
                }
                elseif ($sort=="3") {
                    $this->db->order_by('company_name', 'ASC');
                }
                elseif ($sort=="4") {
                    $this->db->order_by('company_name', 'DESC');
                }
                else{
                    $this->db->order_by('company_date', 'ASC');
                }
              }
              else{
                $this->db->order_by('company_date', 'DESC');
              }

              if (isset($limit)){
                $this->db->limit($limit);
              }

              $query = $this->db->get();

              if($query -> num_rows() == 0){
                return false;
              }
              else{
                return $query->result_array();
              }


            }

            public function get_activity($limit){

              $this->db->select('*');
              $this->db->from('tbl_activity');
              $this->db->join('tbl_company', 'tbl_activity.company_id = tbl_company.company_id');
              if (isset($limit)){
                $this->db->limit($limit);
              }
              $this->db->order_by('tbl_activity.activity_date', 'DESC');

              $query = $this->db->get();
              return $query->result_array();
            }

            public function get_allCompanies($limit){

              $this->db->select('*');
              $this->db->from('tbl_company');
              if (isset($limit)){
                $this->db->limit($limit);
              }
              $this->db->order_by('tbl_company.company_date', 'DESC');

              $query = $this->db->get();
              return $query->result_array();
            }
            public function get_companyEstimates($id, $limit){

              $this->db->select('*');
              $this->db->from('tbl_estimates');
              $this->db->join('tbl_company', 'tbl_company.company_id = tbl_estimates.company_id');
              $this->db->where('tbl_estimates.company_id', $id);
              if (isset($limit)){
                $this->db->limit($limit);
              }
              $this->db->order_by('tbl_estimates.estimate_modifiedDate', 'DESC');

              $query = $this->db->get();
              return $query->result_array();
            }
            public function get_companyInfo($id){

              $this->db->select('*');
              $this->db->from('tbl_company');
              $this->db->where('tbl_company.company_id', $id);

              $query = $this->db->get();
              return $query->row_array();
            }

            public function get_summary($id){

              $this->db->select('*');
              $this->db->from('tbl_results');
              $this->db->where('tbl_results.estimate_id', $id);

              $query = $this->db->get();
              return $query->row_array();
            }


}

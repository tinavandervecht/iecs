<?php
class Profile_model extends CI_Model {

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

        public function check_login(){

                      $email = $this->input->post('company_email');
                      $password = $this->input->post('company_pw');
                      $this -> db -> select('*');
                      $this -> db -> from('tbl_company');
                      $this -> db -> where('company_email', $email);
                      $this -> db -> where('company_pw', $password);
                      $this -> db -> limit(1);
                      $query = $this -> db -> get();

                      if($query -> num_rows() == 1){
                        return $query->row_array();
                      }
                      else{
                        return false;
                      }
        }

      public function set_profile(){

                      $this->load->helper('url');
                      date_default_timezone_set('America/Toronto');

                      $data = array(
                          'company_email' => $this->input->post('company_email'),
                          'company_pw' => $this->input->post('company_pw'),
                          'company_date' => date('Y-m-d H:i:s'),
                          'company_name' => $this->input->post('company_name'),
                          'company_contactName' => $this->input->post('company_contactName'),

                          'company_status' => 1
                      );

                      return $this->db->insert('tbl_company', $data);
      }

      public function alter_profile(){
        date_default_timezone_set('America/Toronto');
        $data = array(
        'company_name' => $this->input->post('name'),
        'company_contactName' => $this->input->post('contactName'),
        'company_phone' => $this->input->post('phone'),
        );
        $this->db->set($data);
        $this->db->where('company_id', $_SESSION['company_id']);
        $this->db->update('tbl_company');

        $data = array(
          'company_id' => $_SESSION['company_id'],
          'activity_desc' => "Updated their company profile.",
          'activity_date' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('tbl_activity', $data);
      }
}

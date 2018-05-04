<?php
class Admin_model extends CI_Model {
  //THIS IS THE MODEL FOR THE ADMIN CONTROLLER, WHICH MAKES ANY DB CALLING FUNCTIONS FOR THE CONTROLLER.

        public function __construct()
        {
                $this->load->database(); //loads the db helper, necessary in every model.
        }

        public function check_adminlogin(){

            //THIS IS THE FUNCTION USED TO VERIFY LOGIN INFORMATION AND LOG IN A USER TO THE ADMIN PANEL.

              $admin = $this->input->post('admin_user');
              $password = $this->input->post('admin_pw');
              $this -> db -> select('*');
              $this -> db -> from('tbl_admin');
              $this -> db -> where('admin_username', $admin);
              $query = $this -> db -> get();

              foreach ($query->result() as $possibleAdmin) {
                  if (password_verify($password, $possibleAdmin->admin_pw)) {
                      $data = array(
                        'admin_lastLogin' => time()
                      );
                      $this->db->update('tbl_admin', $data, "admin_id = 1"); //update the last login time.
                      return $query->row_array(); //Return the user info in a row_array (single dimensional associative array).
                      break;
                  }
              }

                return false; //IF FALSE IS PASSED, THE CONTROLLER WILL REALIZE THE INFO IS WRONG AND WILL RELOAD THE ADMIN LOGIN SCREEN.
            }

            public function get_allEstimates($limit){
              //Function for getting all the estimates for the estimates cms page.

              $this->db->select('*');
              $this->db->from('tbl_estimates');
              $this->db->join('tbl_company', 'tbl_company.company_id = tbl_estimates.company_id');
              if (isset($limit)){
                $this->db->limit($limit);
              }
              $this->db->order_by('tbl_estimates.estimate_modifiedDate', 'DESC');

              $query = $this->db->get();
              return $query->result_array(); //RESULT_ARRAY() RETURNS A TWO DIMENSION ASSOCIATIVE ARRAY (you would have the syntax be like array[i]['name'])
            }

            public function search_estimates($limit){
              //A FUNCTION FOR SEARCHING FOR SPECIFIC ENTRIES IN THE ESTIMATES

              $search = $this->input->post('search');
              $sort = $this->input->post('sort');

              $this->db->select('*');
              $this->db->from('tbl_estimates');
              $this->db->join('tbl_company', 'tbl_company.company_id = tbl_estimates.company_id');
              if (isset($search)) {
                $this->db->like('tbl_estimates.estimate_name', $search);
                $this->db->or_like('tbl_company.company_name', $search);
              }

              if (isset($sort)) { //CHANGES THE ORDERING DEPENDING ON WHICH SELECTOR IS SELECTED
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

            public function ajax_estimate($sort, $search){ //FUNCTION FOR THE AJAX SEARCH FUNCTIONALITY. DOES THE SAME AS THE ABOVE FUNCTION.

              $this->db->select('*');
              $this->db->from('tbl_estimates');
              $this->db->join('tbl_company', 'tbl_company.company_id = tbl_estimates.company_id');
              if (isset($search)) {
                $this->db->like('tbl_estimates.estimate_name', $search);
                $this->db->or_like('tbl_company.company_name', $search);
              }

                if ($sort=="1"){ //CHANGING THE ORDERING BASED ON THE DESIGNATED SORTING INPUT ON THE FORM
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

              $this->db->limit(12);

              $query = $this->db->get();

              if($query -> num_rows() == 0){
                return false;
              }
              else{
                return $query->result_array();
              }

            }


            public function search_companies($limit){
              //SIMILAR AS ABOVE, SEARCH FUNCTION FOR THE COMPANIES

              $search = $this->input->post('search');
              $sort = $this->input->post('sort');

              $this->db->select('*');
              $this->db->from('tbl_company');
              if (isset($search)) {
                $this->db->like('company_name', $search);
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

            public function ajax_companies($sort, $search){
              //AJAX FUNCTION USED FOR SEARCHING FOR COMPANIES

              $this->db->select('*');
              $this->db->from('tbl_company');
              if (isset($search)) {
                $this->db->like('company_name', $search);
                $this->db->or_like('company_contactName', $search);
                $this->db->or_like('company_email', $search);
              }

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

              $this->db->limit(8);

              $query = $this->db->get();

              if($query -> num_rows() == 0){
                return false;
              }
              else{
                return $query->result_array();
              }
            }

            public function get_activity($limit){
              //GETS ALL ACTIVITY FOR THE ACTIVITY PAGE AND ATTACHED COMPANY INFO TO EACH ENTRY

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
              //FUNCTION FOR GETTING ALL THE COMPANIES FOR THE CMS COMPANIES PAGE

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
              //FOR POPULATING THE INDIVIDUAL COMPANY PAGES, GETS ALL ESTIMATES ASSOCIATED WITH A COMPANY.

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
              //GETS THE INFO FOR A GIVEN COMPANY.

              $this->db->select('*');
              $this->db->from('tbl_company');
              $this->db->where('tbl_company.company_id', $id);

              $query = $this->db->get();
              return $query->row_array();
            }

            public function get_summary($id){
              //For the summary page.

              $this->db->select('*');
              $this->db->from('tbl_estimates');
              //$this->db->join('tbl_results', 'tbl_estimates.estimate_id = tbl_results.results_id');
              $this->db->join('tbl_company', 'tbl_company.company_id = tbl_estimates.company_id');
              $this->db->where('tbl_estimates.estimate_id', $id);

              $query = $this->db->get();
              return $query->row_array();
            }

            public function get_summary_data($id){
              $this->db->select('*');
              $this->db->from('tbl_estimates');
              $this->db->join('tbl_company', 'tbl_estimates.company_id = tbl_company.company_id');
              $this->db->where('estimate_id', $id);
              $this->db->order_by('estimate_id', 'DESC');
              $this->db->limit(1);
              $query = $this->db->get();
              if($query -> num_rows() == 1){
                return $query->row_array();
              }
              else{
                return false;
              }
            }

            public function get_profile($ID)
            {
              $query = $this->db->get_where('tbl_admin', array('admin_id' => $ID));
              return $query->row_array();
            }

            public function alter_profile(){
              date_default_timezone_set('America/Toronto');
              $data = array(
              'admin_username' => $this->input->post('username'),
              'admin_name' => $this->input->post('name'),
              );

              if ($this->input->post('new_password')) {
                  $data['admin_pw'] = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
              }

              $this->db->set($data);
              $this->db->where('admin_id', $_SESSION['userdata']['admin_id']);
              $this->db->update('tbl_admin');
            }


}

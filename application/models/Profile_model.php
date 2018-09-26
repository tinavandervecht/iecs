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

    public function check_login()
    {
        //FUNCTION FOR CHECKING THE LOGIN ON THE FRONT END
        $email = $this->input->post('company_email');
        $password = $this->input->post('company_pw');
        $this->db->select('*');
        $this->db->from('tbl_company');
        $this->db->where('company_email', $email);
        $query = $this->db->get();

        foreach($query->result() as $possibleCompany) {
            if (password_verify($password, $possibleCompany->company_pw) && $possibleCompany->company_approved == 1) {
                return $query->row_array();
                break;
            }
        }

        return false;
    }

    public function set_profile()
    {
        //FUNCTION FOR CREATING A NEW PROFILE
        $this->load->helper('url');
        date_default_timezone_set('America/Toronto');

        $data = array(
            'company_email' => $this->input->post('company_email'),
            'company_pw' => password_hash($this->input->post('company_pw'), PASSWORD_DEFAULT),
            'company_date' => date('Y-m-d H:i:s'),
            'company_name' => $this->input->post('company_name'),
            'company_contactName' => $this->input->post('company_contactName'),
            'company_status' => 1
        );

        $this->db->insert('tbl_company', $data);

        return $this->db->insert_id();
    }

    public function alter_profile(){
        //FUNCTION FOR CHANGING THE PROFILE INFORMATION
        date_default_timezone_set('America/Toronto');
        $data = array(
            'company_name' => $this->input->post('name'),
            'company_contactName' => $this->input->post('contactName'),
            'company_phone' => $this->input->post('phone'),
        );

        if ($this->input->post('new_password')) {
            $data['company_pw'] = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
        }

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

    public function update_avatar($id)
    {
        $data = array(
            'company_avatar' => '/img/uploads/'.$this->upload->file_name
        );

        $this->db->set($data);
        $this->db->where('company_id', $id);
        $this->db->update('tbl_company');
    }

    public function clear_avatar($id)
    {
        $data = array(
            'company_avatar' => NULL
        );

        $this->db->set($data);
        $this->db->where('company_id', $id);
        $this->db->update('tbl_company');
    }
}

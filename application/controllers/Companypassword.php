<?php
class Companypassword extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->database();
        $this->load->model('companypassword_model');
        $this->load->helper('url_helper');
    }

    public function forgot()
    {
        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['passwordReset'] = false;

        $this->form_validation->set_rules('company_email','Email Address','trim|required|valid_email|callback__check_email_exists');

        if ($this->form_validation->run() === TRUE) {
            $data = array(
                'company_token' => $this->companypassword_model->generate_token(),
            );

            $this->db->set($data);
            $this->db->where('company_email', $this->input->post('company_email'));
            $this->db->update('tbl_company');

            $query = $this->db->get_where('tbl_company', array('company_email' => $this->input->post('company_email')));
            $company = $query->row_array();

            $this->load->model('email_model');
            $this->email_model->send_company_reset_password_email($company);

            $data['passwordReset'] = true;
        }

        if (isset($_SESSION['tokenExpired']) && $_SESSION['tokenExpired']) {
            $data['tokenExpired'] = true;
            $_SESSION['tokenExpired'] = false;
        }

        $data['title'] = "Reset Password | IECS";
        $data['jsLink'] = 'js/profile.js';
        $data['current'] = "profile";

        $this->load->view('templates/header', $data);
        $this->load->view('password/forgot', $data);
        $this->load->view('templates/footer', $data);
    }

    public function _check_email_exists ($email)
    {
        $query = $this->db->get_where('tbl_company', array('company_email' => $email));
        $company = $query->row_array();

        if ( ! $company ) {
            $this->form_validation->set_message('_check_email_exists', "There's no account associated with that email.");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function reset($token)
    {
        $query = $this->db->get_where('tbl_company', array('company_token' => $token));
        $company = $query->row_array();

        if (! $company) {
            $_SESSION['tokenExpired'] = true;
            redirect('/companypassword/forgot');
        }

        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('company_pw', 'Password', 'required|min_length[6]|max_length[30]|alpha_numeric');
        $this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'required|matches[company_pw]');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = "Reset Password | IECS";
            $data['jsLink'] = 'js/profile.js';
            $data['current'] = "profile";
            $data['token'] = $token;

            $this->load->view('templates/header', $data);
            $this->load->view('password/reset', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = array(
                'company_pw' => password_hash($this->input->post('company_pw'), PASSWORD_DEFAULT),
                'company_token' => NULL
            );

            $this->db->set($data);
            $this->db->where('company_id', $company['company_id']);
            $this->db->update('tbl_company');

            $_SESSION['PasswordSuccessfullyReset'] = true;
            redirect('/profile/login');
        }
    }
}

<?php
class Adminpassword extends CI_Controller {

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

        $this->form_validation->set_rules('admin_email','Email Address','trim|required|valid_email|callback__check_email_exists');

        if ($this->form_validation->run() === TRUE) {
            $data = array(
                'admin_token' => $this->companypassword_model->generate_token(),
            );

            $this->db->set($data);
            $this->db->where('admin_email', $this->input->post('admin_email'));
            $this->db->update('tbl_admin');

            $query = $this->db->get_where('tbl_admin', array('admin_email' => $this->input->post('admin_email')));
            $admin = $query->row_array();

            $body = '<h3>We\'ve received a password reset request for ' . $admin['admin_name'] . ".</h3>"
                . "If this wasn't you, please feel free to ignore this email or notify us about it at mmcarthur@iecs.com"
                . '<br /><a href="' . site_url('/adminpassword/reset/'. $admin['admin_token']) . '">Click here reset your password.</a>';
            $sub = "Password Reset";
            $this->email->from('noreply@iecs.com', 'Cable Concrete Calculator');
            $this->email->to($admin['admin_email']);

            $this->email->set_mailtype("html");
            $this->email->subject($sub);
            $this->email->message($body);

            $this->email->send();

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
        $this->load->view('adminpassword/forgot', $data);
        $this->load->view('templates/footer', $data);
    }

    public function _check_email_exists ($email)
    {
        $query = $this->db->get_where('tbl_admin', array('admin_email' => $email));
        $admin = $query->row_array();

        if ( ! $admin ) {
            $this->form_validation->set_message('_check_email_exists', "There's no account associated with that email.");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function reset($token)
    {
        $query = $this->db->get_where('tbl_admin', array('admin_token' => $token));
        $admin = $query->row_array();

        if (! $admin) {
            $_SESSION['tokenExpired'] = true;
            redirect('/adminpassword/forgot');
        }

        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('admin_pw', 'Password', 'required|min_length[6]|max_length[30]|alpha_numeric');
        $this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'required|matches[admin_pw]');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = "Reset Password | IECS";
            $data['jsLink'] = 'js/profile.js';
            $data['current'] = "profile";
            $data['token'] = $token;

            $this->load->view('templates/header', $data);
            $this->load->view('adminpassword/reset', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = array(
                'admin_pw' => password_hash($this->input->post('admin_pw'), PASSWORD_DEFAULT),
                'admin_token' => NULL
            );

            $this->db->set($data);
            $this->db->where('admin_id', $admin['admin_id']);
            $this->db->update('tbl_admin');

            $_SESSION['PasswordSuccessfullyReset'] = true;
            redirect('/admin/login');
        }
    }
}

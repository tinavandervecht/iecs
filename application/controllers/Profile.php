<?php
class Profile extends CI_Controller {
    //PROFILE CONTROLLER, CONTAINS ALL THE LOGIN PAGES AND THE PROFILE EDIT PAGE.

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model('profile_model');
        $this->load->model('email_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        if (isset($_SESSION['company_id']) == FALSE) {
            redirect('/profile/login');
        }
        $company = $this->profile_model->get_company($_SESSION['company_id']);

        $this->load->helper('security');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required|max_length[140]');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|max_length[12]');
        $this->form_validation->set_rules('contactName', 'Contact Name', 'required|max_length[30]');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|callback_unique_email');

        if (isset($_POST) && isset($_POST['new_password']) && $_POST['new_password'] != '')
        {
            $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]|max_length[30]|alpha_numeric');
            $this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'required|matches[new_password]');
        }

        if ($this->form_validation->run() === FALSE
            || (! password_verify($_POST['current_password'], $company['company_pw']) && isset($_POST['new_password']) && $_POST['new_password'] != '')
        ){ //IF THEY HAVEN'T ATTEMPTED TO EDIT THEIR INFO OR HAVE DONE SO INCORRECTLY
            //SHOW THE NORMAL PAGE
            $data['userInfo'] = $company;

            if (isset($_POST['current_password']) && ! password_verify($_POST['current_password'], $company['company_pw']) && isset($_POST['new_password']) && $_POST['new_password'] != '') {
                $data['passwordError'] = true;
            }

            $data['title'] = "Profile | IECS";
            $data['jsLink'] = 'js/profile.js';
            $data['current'] = "profile";

            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('profile/view', $data);
            $this->load->view('templates/footerNav', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->profile_model->alter_profile(); //UPDATE THEIR PROFILE AND RELOAD THE PAGE
            $data['userInfo'] = $this->profile_model->get_company($_SESSION['company_id']);

            $data['title'] = "Profile | IECS";
            $data['jsLink'] = 'js/profile.js';
            $data['current'] = "profile";
            $_SESSION['profile_edited'] = true;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav', $data);
            $this->load->view('profile/view', $data);
            $this->load->view('templates/footerNav', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    public function create()
    {
        //FUNCTION FOR THE PROFILE CREATION PAGE

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a new Profile';

        $this->form_validation->set_rules('company_email', 'Email', 'required|valid_email|is_unique[tbl_company.company_email]');
        $this->form_validation->set_rules('company_pw', 'Password', 'required|min_length[6]|max_length[30]|alpha_numeric');
        $this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'required|matches[company_pw]');
        $this->form_validation->set_rules('company_pw', 'Password', 'required|matches[company_pw]');
        $this->form_validation->set_rules('company_province', 'Province', 'required');
        $this->form_validation->set_rules('company_phone', 'Phone Number', 'required|max_length[12]');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Register';
            $data['jsLink'] = 'js/login.js';
            $this->load->view('templates/header', $data);
            $this->load->view('profile/create');
            $this->load->view('templates/footer', $data);
        } else { //IF THE FORM VALIDATES (MEANING THEY FILLED IT OUT AND PRESSED THE LINK)
            $id = $this->profile_model->set_profile(); //SET THE PROFILE INTO THE DATABASE
            $this->email_model->send_account_request_email($this->input, $id);

            $data['title'] = 'Register';
            $data['jsLink'] = 'js/login.js';
            $data['accountRequested'] = true;
            $this->load->view('templates/header', $data);
            $this->load->view('profile/create');
            $this->load->view('templates/footer', $data);
        }
    }

    public function login()
    { //LOGIN PAGE FUNCTION

        if (isset($_SESSION['company_id']) == TRUE) { //IF THEY'RE LOGGED IN ALREADY REDIRECT
            redirect('/dashboard');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Log-In | IECS';
        $data['jsLink'] = 'js/login.js';
        if (isset($_SESSION['PasswordSuccessfullyReset']) && $_SESSION['PasswordSuccessfullyReset']) {
            $data['passwordReset'] = true;
            $_SESSION['PasswordSuccessfullyReset'] = false;
        }

        $this->form_validation->set_rules('company_email', 'Email', 'required');
        $this->form_validation->set_rules('company_pw', 'Password', 'required');

        if ($this->form_validation->run() === FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('profile/login');
            $this->load->view('templates/footer', $data);
        } else {
            $session = $this->profile_model->check_login(); //CHECK THE LOGIN INFO TO SEE IF THE PROFILE EXISTS AND RETURN IT IF IT DOES.
            if($session === FALSE) {
                $data['no_account'] = "The username/password entered was incorrect, please try again.";
                $this->load->view('templates/header', $data);
                $this->load->view('profile/login');
                $this->load->view('templates/footer', $data);
            } else { //IF THERE IS
                $_SESSION['company_id'] = $session['company_id'];
                redirect('/dashboard');
            }
        }
    }

    public function avatar($id)
    {
        $config['upload_path']          = './img/uploads/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['overwrite']            = false;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('avatar')){
            redirect("/profile");
        } else {
            $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;

            $this->load->library('image_lib', $config);

            $this->profile_model->update_avatar($id);
            redirect("/profile");
        }
    }

    public function clear_avatar($id)
    {
        $this->profile_model->clear_avatar($id);
        redirect("/profile");
    }

    public function approve($id)
    {
        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
            redirect('/admin/login');
        }

        $data = array(
            'company_approved' => 1
        );

        $this->db->set($data);
        $this->db->where('company_id', $id);
        $this->db->update('tbl_company');

        $company = $this->profile_model->get_company($id);

        $this->email_model->send_account_approved_email($company['company_email']);

        redirect("/admin/company/" . $id);
    }

    public function deny($id)
    {
        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
            redirect('/admin/login');
        }

        $data = array(
            'company_approved' => 0
        );

        $this->db->set($data);
        $this->db->where('company_id', $id);
        $this->db->update('tbl_company');

        redirect("/admin/company/" . $id);
    }

    public function unique_email($str)
    {
        if (! $this->profile_model->check_unique_email($str, $_SESSION['company_id']))
        {
            $this->form_validation->set_message('unique_email', 'The {field} field must contain a unique value nerp.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}

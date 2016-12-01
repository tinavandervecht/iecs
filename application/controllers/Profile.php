<?php
class Profile extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('profile_model');
                $this->load->helper('url_helper');
        }

        public function index(){

          if (isset($_SESSION['company_id']) == FALSE)
        {
          redirect('/profile/login');
        }
        //$data['tbl_company'] = $this->profile_model->get_company();
        //$data['title'] = 'Companies';
        $data['userInfo'] = $this->profile_model->get_company($_SESSION['company_id']);

        $data['title'] = "Profile | IECS";
        $data['jsLink'] = 'js/profile.js';
        $data['current'] = "profile";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('profile/view', $data);
        $this->load->view('templates/footerNav', $data);
        $this->load->view('templates/footer', $data);
}

        public function views($companyID = NULL){

        $data['userInfo'] = $this->profile_model->get_company($companyID);

        if (empty($data['userInfo']))
        {
                show_404();
        }

        $data['title'] = $data['userInfo']['company_contactName'];

        $this->load->view('templates/header', $data);
        $this->load->view('profile/view', $data);
        $this->load->view('templates/footer');
}

        public function create(){

            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Create a new Profile';

            $this->form_validation->set_rules('company_email', 'Email', 'required|valid_email|is_unique[tbl_company.company_email]');
            $this->form_validation->set_rules('company_pw', 'Password', 'required|min_length[6]|max_length[30]|alpha_numeric');
            $this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'required|matches[company_pw]');
            $this->form_validation->set_rules('company_pw', 'Password', 'required|matches[company_pw]');



            if ($this->form_validation->run() === FALSE)
            {
                $data['title'] = 'Register';
                $data['jsLink'] = 'js/login.js';
                $this->load->view('templates/header', $data);
                $this->load->view('profile/create');
                $this->load->view('templates/footer', $data);

            }
            else
            {
                $this->profile_model->set_profile();
                redirect('/profile/login');
            }
}

      public function login(){

      if (isset($_SESSION['company_id']) == TRUE){
        redirect('/dashboard');
      }

      $this->load->helper('form');
      $this->load->library('form_validation');

      $data['title'] = 'Log-In | IECS';
      $data['jsLink'] = 'js/login.js';

      $this->form_validation->set_rules('company_email', 'Email', 'required');
      $this->form_validation->set_rules('company_pw', 'Password', 'required');

    if ($this->form_validation->run() === FALSE){

        $this->load->view('templates/header', $data);
        $this->load->view('profile/login');
        $this->load->view('templates/footer', $data);
    }

    else{

        $session = $this->profile_model->check_login();

        if($session === FALSE)
        {

          $this->load->view('templates/header', $data);
          $this->load->view('profile/login');
          $this->load->view('templates/footer', $data);
        }

        else{

          //$this->load->view('templates/header', $data);
          //$this->load->view('profile/view', $data);
          //$this->load->view('templates/footer');
          $this->session->set_userdata($session);
          //$this->views($data['userInfo']['company_id']);
          redirect('/dashboard');
        }

    }
}

}

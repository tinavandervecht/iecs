<?php
class Profile extends CI_Controller {
  //PROFILE CONTROLLER, CONTAINS ALL THE LOGIN PAGES AND THE PROFILE EDIT PAGE.

        public function __construct()
        {
                parent::__construct();
                $this->load->model('profile_model');
                $this->load->helper('url_helper');
        }

        public function index(){
          //THEIR PROFILE PAGE, CONTAINS A FORM WHERE THEY CAN UPDATE THEIR PROFILE INFO.

          if (isset($_SESSION['company_id']) == FALSE)
        {
          redirect('/profile/login');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Phone Number', 'required|max_length[140]');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|max_length[12]');
        $this->form_validation->set_rules('contactName', 'Phone Number', 'required|max_length[30]');

        if ($this->form_validation->run() === FALSE){ //IF THEY HAVEN'T ATTEMPTED TO EDIT THEIR INFO OR HAVE DONE SO INCORRECTLY
          //SHOW THE NORMAL PAGE

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

        else{
          $this->profile_model->alter_profile(); //UPDATE THEIR PROFILE AND RELOAD THE PAGE
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

        //$data['tbl_company'] = $this->profile_model->get_company();
        //$data['title'] = 'Companies';

}


        public function create(){
          //FUNCTION FOR THE PROFILE CREATION PAGE

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
            else //IF THE FORM VALIDATES (MEANING THEY FILLED IT OUT AND PRESSED THE LINK)
            {
                $this->profile_model->set_profile(); //SET THE PROFILE INTO THE DATABASE
                redirect('/profile/login');
            }
}

      public function login(){ //LOGIN PAGE FUNCTION

      if (isset($_SESSION['company_id']) == TRUE){ //IF THEY'RE LOGGED IN ALREADY REDIRECT
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

        $session = $this->profile_model->check_login(); //CHECK THE LOGIN INFO TO SEE IF THE PROFILE EXISTS AND RETURN IT IF IT DOES.

        if($session === FALSE) //IF THERES NO ENTRY
        {

          $this->load->view('templates/header', $data);
          $this->load->view('profile/login');
          $this->load->view('templates/footer', $data);
        }

        else{ //IF THERE IS

          $this->session->set_userdata($session); //UPLOAD THE USER DATA TO THE SESSION AND REDIRECT
          redirect('/dashboard');
        }

    }
}

}

<?php
class Admin extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('admin_model');
                $this->load->helper('url_helper');
        }

        public function index(){

          if (isset($_SESSION['admin_id']) == FALSE)
        {
          redirect('/admin/login');
        }
        //$data['tbl_company'] = $this->profile_model->get_company();
        //$data['title'] = 'Companies';
        $data['userInfo'] = $this->admin_model->get_companies($_SESSION['company_id']);

        $data['title'] = "Admin Panel | IECS";
        $data['jsLink'] = 'js/profile.js';
        $data['current'] = "profile";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('profile/view', $data);
        $this->load->view('templates/footerNav', $data);
        $this->load->view('templates/footer', $data);
}

      public function login(){

      if (isset($_SESSION['admin_id']) == TRUE){
        redirect('/admin');
      }

      $this->load->helper('form');
      $this->load->library('form_validation');

      $data['title'] = 'Log-In | IECS';
      $data['jsLink'] = 'js/login.js';

      $this->form_validation->set_rules('company_email', 'Email', 'required');
      $this->form_validation->set_rules('company_pw', 'Password', 'required');

    if ($this->form_validation->run() === FALSE){

        $this->load->view('templates/header', $data);
        $this->load->view('admin/login');
        $this->load->view('templates/footer', $data);
    }

    else{

        $session = $this->admin_model->check_admin();

        if($session === FALSE)
        {

          $this->load->view('templates/header', $data);
          $this->load->view('admin/login');
          $this->load->view('templates/footer', $data);
        }

        else{

          //$this->load->view('templates/header', $data);
          //$this->load->view('profile/view', $data);
          //$this->load->view('templates/footer');
          $this->session->set_userdata($session);
          //$this->views($data['userInfo']['company_id']);
          redirect('/admin');
        }

    }
}

}

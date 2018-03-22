<?php
class Dashboard extends CI_Controller {

  //THIS IS THE DASHBOARD CONTROLLER, WHICH DICTATES ALL THE CONTENT WITHIN THE DASHBOARD URL GATEWAY

        public function __construct()
        {
                parent::__construct();
                $this->load->model('dashboard_model');
                $this->load->helper('url_helper');
        }

          public function index(){ //FUNCTION FOR site/dashboard/
$_SESSION['company_id'] = 1;
            //THIS IS THE FUNCTIO

            //if (isset($_SESSION['company_id']) == FALSE) //IF THEYRE NOT LOGGED IN, REDIRECT TO THE LOG-IN FORM (THIS MUST GO IN EVERY FRONT FACING CONTROLLER FUNCTION FOR SECURITY)
          //{
          //  redirect('/profile/login');
          //}

          $data['userInfo'] = $this->dashboard_model->get_company($_SESSION['company_id']);
          $data['estimatesInfo'] = $this->dashboard_model->get_estimateHistory($_SESSION['company_id']);

          $data['title'] = "Dashboard | IECS";
          $data['jsLink'] = 'js/dash.js';
          $data['current'] = "dashboard";

          $this->load->view('templates/header', $data);
          $this->load->view('templates/nav', $data);
          $this->load->view('dashboard/view', $data);
          $this->load->view('templates/footerNav', $data);
          $this->load->view('templates/footer', $data);
  }

}

<?php
class Dashboard extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('dashboard_model');
                $this->load->helper('url_helper');
        }

          public function index()
  {
            if (isset($_SESSION['company_id']) == FALSE)
          {
            redirect('/profile/login');
          }
          //$data['tbl_company'] = $this->profile_model->get_company();
          //$data['title'] = 'Companies';
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

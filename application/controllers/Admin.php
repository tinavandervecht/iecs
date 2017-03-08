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
        //$data['userInfo'] = $this->admin_model->get_adminInfo($_SESSION['admin_id']);
        $data['activity'] = $this->admin_model->get_activity(4);

        $data['title'] = "Admin Panel | IECS";
        $data['jsLink'] = 'js/dash.js';
        $data['current'] = "dashboard";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/adminNav', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/adminFooterNav', $data);
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

        $this->form_validation->set_rules('admin_user', 'required');
        $this->form_validation->set_rules('admin_pw', 'Password', 'required');

      if ($this->form_validation->run() === FALSE){

          $this->load->view('templates/header', $data);
          $this->load->view('admin/login');
          $this->load->view('templates/footer', $data);
      }

      else{

          $session = $this->admin_model->check_adminlogin();

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

      public function activity(){

        if (isset($_SESSION['admin_id']) == FALSE)
      {
        redirect('/admin/login');
      }
      //$data['tbl_company'] = $this->profile_model->get_company();
      //$data['title'] = 'Companies';
      //$data['userInfo'] = $this->admin_model->get_adminInfo($_SESSION['admin_id']);
      $data['activity'] = $this->admin_model->get_activity(8);

      $data['title'] = "Activity | IECS";
      $data['jsLink'] = 'js/dash.js';
      $data['current'] = "activity";

      $this->load->view('templates/header', $data);
      $this->load->view('templates/adminNav', $data);
      $this->load->view('admin/activity', $data);
      $this->load->view('templates/adminFooterNav', $data);
      $this->load->view('templates/footer', $data);
    }

      public function estimates(){

        if (isset($_SESSION['admin_id']) == FALSE)
      {
        redirect('/admin/login');
      }
      $this->load->helper('form');
      $this->load->library('form_validation');

      $post = $this->input->post("submit");

      if (!isset($post)){
        $data['estimates'] = $this->admin_model->get_allEstimates(12);

        $data['title'] = "Analyses | IECS";
        $data['jsLink'] = 'js/dash.js';
        $data['current'] = "estimates";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/adminNav', $data);
        $this->load->view('admin/estimates', $data);
        $this->load->view('templates/adminFooterNav', $data);
        $this->load->view('templates/estimatefooter', $data);
    }

      else {
        $data['estimates'] = $this->admin_model->search_estimates(12);

        $data['title'] = "Analyses | IECS";
        $data['jsLink'] = 'js/dash.js';
        $data['current'] = "estimates";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/adminNav', $data);
        $this->load->view('admin/estimates', $data);
        $this->load->view('templates/adminFooterNav', $data);
        $this->load->view('templates/estimatefooter', $data);
      }
      //$data['tbl_company'] = $this->profile_model->get_company();
      //$data['title'] = 'Companies';
      //$data['userInfo'] = $this->admin_model->get_adminInfo($_SESSION['admin_id']);

    }
    public function summary($id){

      if (isset($_SESSION['admin_id']) == FALSE)
    {
      redirect('/admin/login');
    }

      if ($id==NULL) {

        redirect('/admin/estimates');
      }

      //$data['summary'] = $this->admin_model->get_summary($id);
      $data['title'] = "Estimate Summary";
      $data['jsLink'] = 'js/cms_estimate_summary.js';
      $data['current'] = "estimates";

      $this->load->view('templates/header', $data);
      $this->load->view('templates/adminNav', $data);
      $this->load->view('admin/summary', $data);
      $this->load->view('templates/adminFooterNav', $data);
      $this->load->view('templates/footer', $data);

  }

  public function companies(){

    if (isset($_SESSION['admin_id']) == FALSE)
  {
    redirect('/admin/login');
  }

  $this->load->helper('form');
  $this->load->library('form_validation');

  $post = $this->input->post('sort');

  if (!isset($post)){
    $data['companies'] = $this->admin_model->get_allCompanies(8);

    $data['title'] = "Companies | IECS";
    $data['jsLink'] = 'js/dash.js';
    $data['current'] = "companies";

    $this->load->view('templates/header', $data);
    $this->load->view('templates/adminNav', $data);
    $this->load->view('admin/companies', $data);
    $this->load->view('templates/adminFooterNav', $data);
    $this->load->view('templates/companyfooter', $data);
}

  else {
    $data['companies'] = $this->admin_model->search_companies(8);

    $data['title'] = "Companies | IECS";
    $data['jsLink'] = 'js/dash.js';
    $data['current'] = "companies";

    $this->load->view('templates/header', $data);
    $this->load->view('templates/adminNav', $data);
    $this->load->view('admin/companies', $data);
    $this->load->view('templates/adminFooterNav', $data);
    $this->load->view('templates/companyfooter', $data);
  }

  //$data['tbl_company'] = $this->profile_model->get_company();
  //$data['title'] = 'Companies';
  //$data['userInfo'] = $this->admin_model->get_adminInfo($_SESSION['admin_id']);

}

  public function company($id){

    if (isset($_SESSION['admin_id']) == FALSE){
      redirect('/admin/login');
    }

    if ($id==NULL){
      redirect('/admin/companies');
    }

    //$data['tbl_company'] = $this->profile_model->get_company();
    //$data['title'] = 'Companies';
    //$data['userInfo'] = $this->admin_model->get_adminInfo($_SESSION['admin_id']);
    $data['company'] = $this->admin_model->get_companyEstimates($id, 6);
    $data['companyInfo'] = $this->admin_model->get_companyInfo($id);

    $data['title'] = $data['companyInfo']['company_name'];
    $data['jsLink'] = 'js/dash.js';
    $data['current'] = "companies";

    $this->load->view('templates/header', $data);
    $this->load->view('templates/adminNav', $data);
    $this->load->view('admin/company', $data);
    $this->load->view('templates/adminFooterNav', $data);
    $this->load->view('templates/footer', $data);
 }

 public function statistics(){

   if (isset($_SESSION['admin_id']) == FALSE){
     redirect('/admin/login');
   }

   //$data['tbl_company'] = $this->profile_model->get_company();
   //$data['title'] = 'Companies';
   //$data['userInfo'] = $this->admin_model->get_adminInfo($_SESSION['admin_id']);

   $data['title'] = 'Statistics Page';
   $data['jsLink'] = 'js/dash.js';
   $data['current'] = "statistics";

   $this->load->view('templates/header', $data);
   $this->load->view('templates/adminNav', $data);
   $this->load->view('admin/statistics', $data);
   $this->load->view('templates/adminFooterNav', $data);
   $this->load->view('templates/footer', $data);
 }

 public function ajaxCompanies(){
   if (isset($_GET['value'])){
     $data['companies'] = $this->admin_model->ajax_companies($_GET['value'], $_GET['search']);
     echo json_encode($data['companies']);
   }
 }

 public function ajaxEstimates(){
   if (isset($_GET['value'])){
     $data['estimates'] = $this->admin_model->ajax_estimate($_GET['value'], $_GET['search']);
     echo json_encode($data['estimates']);
   }
 }


}

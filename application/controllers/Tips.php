<?php
class Tips extends CI_Controller {
  //TIPS PAGE, NO LONGER USED IN THE SITE.

        public function __construct()
        {
                parent::__construct();
                session_start();
                $this->load->model('profile_model');
                $this->load->helper('url_helper');
        }

        public function index(){
        if (isset($_SESSION['company_id']) == FALSE)
        {
         redirect('/profile/login');
        }
        $data['userInfo'] = $this->profile_model->get_company($_SESSION['company_id']);

        $data['title'] = "Tips | IECS";
        $data['jsLink'] = 'js/quotes.js';
        $data['current'] = "tips";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('tips/index', $data);
        $this->load->view('templates/footerNav', $data);
        $this->load->view('templates/footer', $data);
      }

}

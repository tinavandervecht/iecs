<?php
class Help extends CI_Controller {
  //FAQs PAGE

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model('profile_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        if (isset($_SESSION['company_id']) == FALSE) {
            redirect('/profile/login');
        }

        $data['userInfo'] = $this->profile_model->get_company($_SESSION['company_id']);

        $data['title'] = "FAQs | IECS";
        $data['jsLink'] = 'js/quotes.js';
        $data['current'] = "help";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('help/index', $data);
        $this->load->view('templates/footerNav', $data);
        $this->load->view('templates/footer', $data);
    }

}

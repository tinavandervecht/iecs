<?php
class AcbDesignFiles extends CI_Controller {

  //THIS IS THE DASHBOARD CONTROLLER, WHICH DICTATES ALL THE CONTENT WITHIN THE DASHBOARD URL GATEWAY

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model('dashboard_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        if (isset($_SESSION['company_id']) == FALSE) {
            redirect('/profile/login');
        }

        $data['userInfo'] = $this->dashboard_model->get_company($_SESSION['company_id']);
        $data['title'] = "ACB Design Files | IECS";
        $data['jsLink'] = 'js/dash.js';
        $data['current'] = "acbDesignFiles";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('acbDesignFiles/index', $data);
        $this->load->view('templates/footerNav', $data);
        $this->load->view('templates/footer', $data);
    }
}

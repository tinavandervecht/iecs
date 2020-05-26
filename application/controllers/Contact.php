<?php
class Contact extends CI_Controller {

  //THIS IS THE DASHBOARD CONTROLLER, WHICH DICTATES ALL THE CONTENT WITHIN THE DASHBOARD URL GATEWAY

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model('dashboard_model');
        $this->load->helper('url_helper');
        $this->load->library('email');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('email_model');
    }

    public function index()
    {
        if (isset($_SESSION['company_id']) == FALSE) {
            redirect('/profile/login');
        }

        $data['userInfo'] = $this->dashboard_model->get_company($_SESSION['company_id']);
        $data['title'] = "Contact Us | IECS";
        $data['jsLink'] = 'js/dash.js';
        $data['current'] = "contact";

        if (isset($_SESSION['formErrors']) && $_SESSION['formErrors']) {
            $data['formErrors'] = $_SESSION['formErrors'];
            $_SESSION['formErrors'] = null;
        }

        if (isset($_SESSION['formSubmitted']) && $_SESSION['formSubmitted']) {
            $data['formSubmitted'] = $_SESSION['formSubmitted'];
            $_SESSION['formSubmitted'] = null;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('contact/index', $data);
        $this->load->view('templates/footerNav', $data);
        $this->load->view('templates/footer', $data);
    }

    public function requestQuote()
    {
        if (isset($_SESSION['company_id']) == FALSE) {
            redirect('/profile/login');
        }

        $this->form_validation->set_rules('request_quote_subject', 'Subject', 'required');
        $this->form_validation->set_rules('request_quote_message', 'Message', 'required');
        $this->form_validation->set_message('required', 'Please fill out the %s.');

        if ($this->form_validation->run() === TRUE) {
            $company = $this->dashboard_model->get_company($_SESSION['company_id']);
            $this->email_model->send_contact_email(
                $this->input->post('request_quote_subject'),
                $this->input->post('request_quote_message'),
                $company
            );

            $_SESSION['formSubmitted'] = true;
        }

        $_SESSION['formErrors'] = validation_errors();
        $this->index();
    }

    public function requestWebinar()
    {
        if (isset($_SESSION['company_id']) == FALSE) {
            redirect('/profile/login');
        }

        $this->form_validation->set_rules('request_webinar_subject', 'Subject', 'required');
        $this->form_validation->set_rules('request_webinar_message', 'Message', 'required');
        $this->form_validation->set_message('required', 'Please fill out the %s.');

        if ($this->form_validation->run() === TRUE) {
            $company = $this->dashboard_model->get_company($_SESSION['company_id']);
            $this->email_model->send_contact_email(
                $this->input->post('request_webinar_subject'),
                $this->input->post('request_webinar_message'),
                $company
            );

            $_SESSION['formSubmitted'] = true;
        }

        $_SESSION['formErrors'] = validation_errors();
        $this->index();
    }
}

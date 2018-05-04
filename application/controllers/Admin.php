<?php
class Admin extends CI_Controller { //ALL FUNCTIONS GO INSIDE THE ADMIN CONTROLLER

  //THIS IS THE ADMIN CONTROLLER, WHICH DICTATES ALL THE CONTENT WITHIN THE ADMIN URL GATEWAY

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model('admin_model'); //THIS LOADS THE ADMIN MODEL, CONTAINING ALL QUERY FUNCTIONS FOR THE ADMIN CONTROLLER
        $this->load->model('blocks_model');
        $this->load->helper('url_helper');
        $this->load->library('email');
    }

    public function index()
    { //FUNCTION FOR site/admin/

        //THIS IS THE FUNCTION FOR PAGE THAT LOADS WHEN YOU ENTER THE CMS PANEL. IT GETS ACTIVITY HISTORY FROM THE DATABASE AND DISPLAYS IT VIA THE ADMIN/DASHBOARD VIEW.

        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
            redirect('/admin/login');
        }

        //VARIABLES ARE PASSED TO THE VIEW THROUGH THE DATA VARIABLES

        $data['activity'] = $this->admin_model->get_activity(4);

        $data['title'] = "Admin Panel | IECS"; //THE TITLE VARIABLE DEFINES THE WEBPAGE TITLE IN THE HEADER TEMPLATE VIEW
        $data['jsLink'] = 'js/dash.js'; //THE JSLINK VARIABLE DEFINES WHICH JAVASCRIPT FILE IS LINKED ON A PAGE IN THE FOOTER TEMPLATE VIEW
        $data['current'] = "dashboard"; //THE CURRENT VARIABLE DEFINES WHICH PAGE IN THE NAV TEMPLATE VIEW IS CURRENTLY ACTIVE

        //THE VIEWS ARE LOADED AND VARIABLES ARE PASSED THROUGH $data.
        $this->load->view('templates/header', $data);
        $this->load->view('templates/adminNav', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/adminFooterNav', $data);
        $this->load->view('templates/footer', $data);
    }

    public function login()
    { //FUNCTION FOR site/admin/login

        //THIS IS THE ADMIN LOGIN PAGE FUNCTION. IT CALLS ITSELF FROM WITHIN THE VIEW TO LOG THE USER IN AS WELL

        if (isset($_SESSION['userdata']['admin_id']) == TRUE) { //IF THEY'RE ALREADY LOGGED IN
            redirect('/admin');
        }

        $this->load->helper('form');
        $this->load->library('form_validation'); //THE FORM VALIDATION LIBRARY IS LOADED EVERYTIME A FORM IS USED ON A FORM.

        $data['title'] = 'Log-In | IECS';
        $data['jsLink'] = 'js/login.js';

        //LOG-IN FORM VALIDATION
        $this->form_validation->set_rules('admin_user', 'required');
        $this->form_validation->set_rules('admin_pw', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) { //FORM VALIDATION RETURNS FALSE IF THE FORM HASNT BEEN FILLED OUT OR IS FILLED OUT WRONG

            //IN THIS CASE THE PAGE IS JUST NORMALLY DISPLAYED. IF THERE ARE FORM ERRORS THEY ARE PASSED IN THE VIEWS.

            $this->load->view('templates/header', $data);
            $this->load->view('admin/login');
            $this->load->view('templates/footer', $data);
        } else { //IF THE PAGE IS CALLING ITSELF THROUGH THE FORM AND IF THE FORM VALIDATES (MEANING THEY PROPERLY FILLED OUT THE LOGIN FORM)
            $session = $this->admin_model->check_adminlogin(); //THIS FUNCTION ATTEMPTS TO LOG IN THE USER, RETURNS FALSE IF THE INFO IS WRONG
            if($session === FALSE) {
                //THE PAGE IS RELOADED
                $this->load->view('templates/header', $data);
                $this->load->view('admin/login');
                $this->load->view('templates/footer', $data);
            } else { //THE LOGIN IS SUCCESSFUL
                $_SESSION['userdata']['admin_id'] = $session['admin_id'];
                $_SESSION['userdata']['admin_name'] = $session['admin_name'];
                redirect('/admin'); //REDIRECT TO THE DASHBOARD.
            }
        }
    }

    public function activity()
    { //FUNCTION FOR  site/admin/activity
        //THIS PAGE GETS ACTIVITY INFORMATION FROM THE DATABASE AND DISPLAYS IT VIA THE admin/activity VIEW.

        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
            redirect('/admin/login');
        }

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

    public function estimates()
    { //FUNCTION FOR site/admin/Activity
    //THIS PAGE GETS ALL ESTIMATES INFORMATION AND DISPLAYS IT VIA THE admin/estimates VIEW. IT HAS A UNIQUE FOOTER FOR THE AJAX ON THE PAGE.

        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
            redirect('/admin/login');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $post = $this->input->post("submit");

        if (!isset($post)) {
            $data['estimates'] = $this->admin_model->get_allEstimates(12);

            $data['title'] = "Analyses | IECS";
            $data['jsLink'] = 'js/dash.js';
            $data['current'] = "estimates";

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adminNav', $data);
            $this->load->view('admin/estimates', $data);
            $this->load->view('templates/adminFooterNav', $data);
            $this->load->view('templates/estimatefooter', $data);
        } else {
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
    }

    public function summary($id)
    { //THIS IS THE FUNCTION FOR site/admin/summary/(id)
        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
            redirect('/admin/login');
        }

        if ($id==NULL) { //IF NO SUMMARY IS SELECTED
            redirect('/admin/estimates');
        }

        $data['summary'] = $this->admin_model->get_summary($id);

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email_sub', 'Subject', 'required');
        $this->form_validation->set_rules('email_text', 'Message', 'required');
        $this->form_validation->set_message('required', 'Please fill out the %s.');

        if ($this->form_validation->run() === TRUE) {
            $body = $this->input->post('email_text');
            $sub = $this->input->post('email_sub');
            $this->email->from('', 'IECS'); //IECS EMAIL GOES HERE
            $this->email->to($data['summary']['company_email']);

            $this->email->subject($sub);
            $this->email->message($body);

            $this->email->send();

            $data['sentEmail'] = true;
        }

        $data['id'] = $id;
        $data['title'] = "Estimate Summary";
        $data['jsLink'] = 'js/calcpage.js';
        $data['current'] = "estimates";
        $data['blocks'] = $this->blocks_model->get_all_blocks();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/adminNav', $data);
        $this->load->view('admin/summary', $data);
        $this->load->view('templates/adminFooterNav', $data);
        $this->load->view('templates/footer', $data);
    }

    public function companies()
    { //THIS IS THE FUNCTION FOR site/admin/companies

        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
            redirect('/admin/login');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $post = $this->input->post('sort');

        if (!isset($post)) {
            $data['companies'] = $this->admin_model->get_allCompanies(8);

            $data['title'] = "Companies | IECS";
            $data['jsLink'] = 'js/dash.js';
            $data['current'] = "companies";

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adminNav', $data);
            $this->load->view('admin/companies', $data);
            $this->load->view('templates/adminFooterNav', $data);
            $this->load->view('templates/companyfooter', $data);
        } else {
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

    public function company($id)
    { //THIS IS THE FUNCTION FOR INDIVIDUAL COMPANY PAGES at site/admin/company/(id).
        //THE ID PARAMETER IS USED TO DETERMINE WHICH COMPANY INFO TO DISPLAY IN THE get_companyEstimates and get_companyInfo FUNCTIONS IN THE ADMIN MODEL.

        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
            redirect('/admin/login');
        }

        if ($id==NULL) {
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
        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
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

    public function logout() {
        unset($_SESSION['userdata']['admin_id']);
        unset($_SESSION['userdata']['admin_name']);

        redirect('/admin/login');
    }

    public function products() {
        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
            redirect('/admin/login');
        }

        $data['title'] = 'Products';
        $data['jsLink'] = 'js/dash.js';
        $data['current'] = "products";
        $data['blocks'] = $this->blocks_model->get_all_blocks();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/adminNav', $data);
        $this->load->view('admin/products', $data);
        $this->load->view('templates/adminFooterNav', $data);
        $this->load->view('templates/footer', $data);
    }

    public function product($id)
    {
        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
            redirect('/admin/login');
        }

        if ($id==NULL) {
            redirect('/admin/products');
        }

        try {
            $this->blocks_model->delete_block($id);
        } catch(Exception $e) {
            redirect('/admin/products?delete_error=true');
        }

        redirect('/admin/products?delete_success=true');
    }

    public function create_product() {
        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
            redirect('/admin/login');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create Product';
        $data['jsLink'] = 'js/dash.js';
        $data['current'] = "products";

        $this->form_validation->set_rules('product_name', 'Name', 'required');
        $this->form_validation->set_rules('product_number', 'Product Number', 'required|numeric|max_length[4]');
        $this->form_validation->set_rules('product_b', 'b', 'required|numeric|max_length[8]');
        $this->form_validation->set_rules('product_bT', 'bT', 'required|numeric|max_length[8]');
        $this->form_validation->set_rules('product_hB', 'hB', 'required|numeric|max_length[8]');
        $this->form_validation->set_rules('product_W', 'W', 'required|numeric|max_length[8]');
        $this->form_validation->set_rules('product_Ws', 'Ws', 'required|numeric|max_length[8]');
        $this->form_validation->set_message('required', 'Please fill out the %s.');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/adminNav', $data);
            $this->load->view('admin/create_product', $data);
            $this->load->view('templates/adminFooterNav', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->blocks_model->create_block();

            redirect('/admin/products?created=true');
        }
    }

    //AJAX FUNCTIONS, THESE FUNCTIONS RETURN JSON FOR AJAX FUNCTIONALIY. THEY ARE CALLED BY THE AJAX JAVASCRIPT FUNCTIONS ON THE ESTIMATES AND COMPANIES PAGES.
    public function ajaxCompanies()
    {
        if (isset($_GET['value'])) { //IF THE GET value PARAMETER IS PASSED
            $data['companies'] = $this->admin_model->ajax_companies($_GET['value'], $_GET['search']);
            echo json_encode($data['companies']);
        }
    }

    public function ajaxEstimates()
    {
        if (isset($_GET['value'])) {
            $data['estimates'] = $this->admin_model->ajax_estimate($_GET['value'], $_GET['search']);
            echo json_encode($data['estimates']);
        }
    }

    public function ajaxSummary()
    {
        if (isset($_GET['id'])) {
            $data['estimate'] = $this->admin_model->get_summary_data($_GET['id']);
            echo json_encode($data['estimate']);
        }
    }

}

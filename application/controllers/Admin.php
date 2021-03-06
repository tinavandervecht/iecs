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
        $data['user_activity'] = $this->admin_model->get_users_created_activity();
        $data['year_user_activity'] = $this->admin_model->get_current_year_user_activity();

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

        if (isset($_SESSION['PasswordSuccessfullyReset']) && $_SESSION['PasswordSuccessfullyReset']) {
            $data['passwordReset'] = true;
            $_SESSION['PasswordSuccessfullyReset'] = false;
        }

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
                $data['no_account'] = "The username/password entered was incorrect, please try again.";
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

        $data['activity'] = $this->admin_model->get_activity(40);
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
            $data['estimates'] = $this->admin_model->get_allEstimates();

            $data['title'] = "Analyses | IECS";
            $data['jsLink'] = 'js/dash.js';
            $data['current'] = "estimates";

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adminNav', $data);
            $this->load->view('admin/estimates', $data);
            $this->load->view('templates/adminFooterNav', $data);
            $this->load->view('templates/estimatefooter', $data);
        } else {
            $data['estimates'] = $this->admin_model->search_estimates();

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

        $data['summaryInfo'] = $this->admin_model->get_summary($id);

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email_sub', 'Subject', 'required');
        $this->form_validation->set_rules('email_text', 'Message', 'required');
        $this->form_validation->set_message('required', 'Please fill out the %s.');

        if ($this->form_validation->run() === TRUE) {
            $this->load->model('email_model');
            $this->email_model->send_email_to_company($this->input, $data['summaryInfo']['company_email']);

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
            $data['companies'] = $this->admin_model->get_allCompanies();

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

        $data['company'] = $this->admin_model->get_companyEstimates($id);
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

    public function deleteCompany($id)
    {
        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
            redirect('/admin/login');
        }

        if ($id == NULL) {
            redirect('/admin/companies');
        }

        $estimates = $this->admin_model->get_companyEstimates($id);

        for($i = 0; $i < count($estimates); $i++) {
            $this->db->delete('tbl_estimates', array('estimate_id' => $estimates[$i]['estimate_id']));
        }

        $this->db->delete('tbl_company', array('company_id' => $id));

        redirect('/admin/companies');
    }

    public function statistics(){
        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
            redirect('/admin/login');
        }

        $data['title'] = 'Statistics Page';
        $data['jsLink'] = 'js/dash.js';
        $data['current'] = "statistics";
        $data['user_activity'] = $this->admin_model->get_users_created_activity();
        $data['year_user_activity'] = $this->admin_model->get_current_year_user_activity();
        $data['design_activity'] = $this->admin_model->get_design_activity();
        $data['total_user_activity'] = $this->admin_model->get_user_activity();

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

    public function profile()
    {
        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
            redirect('/admin/login');
        }

        $adminUser = $this->admin_model->get_profile($_SESSION['userdata']['admin_id']);
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required|max_length[12]');
        $this->form_validation->set_rules('name', 'Name', 'required|max_length[140]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if (isset($_POST) && isset($_POST['new_password']) && $_POST['new_password'] != '')
        {
            $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]|max_length[30]|alpha_numeric');
            $this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'required|matches[new_password]');
        }

        if ($this->form_validation->run() === FALSE
            || (! password_verify($_POST['current_password'], $adminUser['admin_pw']) && isset($_POST['new_password']) && $_POST['new_password'] != '')
        ){
            $data['userInfo'] = $adminUser;

            if (isset($_POST['current_password']) && ! password_verify($_POST['current_password'], $adminUser['admin_pw']) && isset($_POST['new_password']) && $_POST['new_password'] != '') {
                $data['passwordError'] = true;
            }

            $data['title'] = "Profile | IECS";
            $data['jsLink'] = 'js/profile.js';
            $data['current'] = "profile";

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adminNav', $data);
            $this->load->view('admin/profile', $data);
            $this->load->view('templates/adminFooterNav', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->admin_model->alter_profile(); //UPDATE THEIR PROFILE AND RELOAD THE PAGE
            $data['userInfo'] = $this->admin_model->get_profile($_SESSION['userdata']['admin_id']);

            $data['title'] = "Profile | IECS";
            $data['jsLink'] = 'js/profile.js';
            $data['current'] = "profile";
            $_SESSION['profile_edited'] = true;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adminNav', $data);
            $this->load->view('admin/profile', $data);
            $this->load->view('templates/adminFooterNav', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    //AJAX FUNCTIONS, THESE FUNCTIONS RETURN JSON FOR AJAX FUNCTIONALIY. THEY ARE CALLED BY THE AJAX JAVASCRIPT FUNCTIONS ON THE ESTIMATES AND COMPANIES PAGES.
    public function ajaxCompanies()
    {
        if (isset($_GET['value'])) { //IF THE GET value PARAMETER IS PASSED
            $data['companies'] = $this->admin_model->ajax_companies($_GET['value'], $_GET['search'], $_GET['limit'] ?? null);
            echo json_encode($data['companies']);
        }
    }

    public function ajaxEstimates()
    {
        if (isset($_GET['value'])) {
            $data['estimates'] = $this->admin_model->ajax_estimate($_GET['value'], $_GET['search'], $_GET['limit'] ?? null);
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

    public function admins()
    {

        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
            redirect('/admin/login');
        }

        $this->load->helper('form');

        $data['admins'] = $this->admin_model->get_allAdmins();

        $data['title'] = "Administrators | IECS";
        $data['jsLink'] = 'js/dash.js';
        $data['current'] = "admins";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/adminNav', $data);
        $this->load->view('admin/admins', $data);
        $this->load->view('templates/adminFooterNav', $data);
        $this->load->view('templates/footer', $data);
    }

    public function deleteAdmin($id)
    {
        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
            redirect('/admin/login');
        }

        $allAdmins = $this->admin_model->get_allAdmins();
        if (count($allAdmins) == 1 || $id == $_SESSION['userdata']['admin_id']) {
            redirect('/admin/admins');
        }

        $this->db->delete('tbl_admin', array('admin_id' => $id));

        redirect('/admin/admins');
    }

    public function createAdmin()
    {
        if (isset($_SESSION['userdata']['admin_id']) == FALSE) {
            redirect('/admin/login');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required|max_length[12]');
        $this->form_validation->set_rules('name', 'Name', 'required|max_length[140]');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]|max_length[30]|alpha_numeric');
        $this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'required|matches[new_password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_admin.admin_email]');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = "Create Administrator | IECS";
            $data['jsLink'] = 'js/dash.js';
            $data['current'] = "admins";

            $this->load->view('templates/header', $data);
            $this->load->view('templates/adminNav', $data);
            $this->load->view('admin/createAdmin', $data);
            $this->load->view('templates/adminFooterNav', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->admin_model->create_admin();

            redirect('/admin/admins');
        }
    }
}

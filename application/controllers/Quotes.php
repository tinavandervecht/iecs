<?php
class Quotes extends CI_Controller {
    //THIS IS THE CONTROLLER FOR THE QUOTES PAGE WHICH CONTAINS THE QUOTES OVERVIEW PAGE (index), THE NEW AND EDIT FORMS FOR ESTIMATES AND THE ESTIMATE SUMMARY PAGE ON THE FRONT END

    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model('quotes_model');
        $this->load->model('blocks_model');
        $this->load->helper('url_helper');
        $this->load->library('email');
    }

    public function index() //THE QUOTES OVERVIEW PAGE, PRINTS OUT ALL THE CURRENT ESTIMATES FOR THIS COMPANY
    {
        if (isset($_SESSION['company_id']) == FALSE) {
            redirect('/profile/login');
        }

        $data['userInfo'] = $this->quotes_model->get_company($_SESSION['company_id']);
        $data['estimatesInfo'] = $this->quotes_model->get_estimateHistory($_SESSION['company_id']);

        $data['title'] = "Designs | IECS";
        $data['jsLink'] = 'js/quotes.js';
        $data['current'] = "quotes";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('quotes/view', $data);
        $this->load->view('templates/footerNav', $data);
        $this->load->view('templates/footer', $data);
    }

    public function deleteQuote($estimateID, $location)
    {
        //FUNCTION FOR "deleting" ESTIMATES. CHANGES THE STATUS OF THE ESTIMATE WITH THE GIVEN ID AND REDIRECTS TO THE GIVEN LOCATION.
        $this->quotes_model->delete_quote($estimateID);
        redirect('/'.$location);
    }

    public function newQuote()
    {
        //THE FUNCTION FOR SHOWING THE NEW ESTIMATE FORM.
        if (isset($_SESSION['company_id']) == FALSE) {
            redirect('/profile/login');
        }
        $this->load->helper('form');
        $this->load->library('form_validation');

        //FORM VALIDATION
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('flowMeters', 'Expected Flow', 'required|numeric|max_length[6]');
        $this->form_validation->set_rules('velocityMeters', 'Expected Velocity', 'required|numeric|max_length[6]');
        $this->form_validation->set_rules('bedSlopeDecimal', 'Bed Slope', 'required|numeric|max_length[6]');
        $this->form_validation->set_rules('sideSlopeDecimal', 'Side Slope', 'required|numeric|max_length[6]');
        $this->form_validation->set_rules('bedMeters', 'Bed Width', 'required|numeric|max_length[6]');
        if ($this->input->post('alignType')!=0) { //IF ITS A STRAIGHT ALIGNMENT VALIDATE THESE AS WELL
            $this->form_validation->set_rules('crestMeters', 'Crest Radius', 'required|numeric|max_length[6]');
            $this->form_validation->set_rules('channelMeters', 'Channel Length', 'required|numeric|max_length[6]');
            $this->form_validation->set_rules('depthMeters', 'Channel Depth', 'required|numeric|max_length[6]');
            $this->form_validation->set_rules('topMeters', 'Top Width', 'required|numeric|max_length[6]');
        }
        $this->form_validation->set_message('required', 'Please fill out the %s.');

        if ($this->form_validation->run() === FALSE) { //IF THE FORM HAS UNSUCCESSFULLY VALIDATED (MEANING ITS A FRESH FORM OR AN INCORRECT FROM)
            //SHOW THE PAGE
            $data['userInfo'] = $this->quotes_model->get_company($_SESSION['company_id']);
            $data['title'] = "New Design | IECS";
            $data['jsLink'] = 'js/form.js';
            $data['current'] = "quotes";

            $this->load->view('templates/header', $data);
            $this->load->view('templates/quoteNav', $data);
            $this->load->view('quotes/new', $data);
            $this->load->view('templates/footerNav', $data);
            $this->load->view('templates/footer', $data);
        } else { //IF IT VALIDATES
            $this->quotes_model->set_quote(); //ADD THE ENTRY TO THE DATABASE
            $data['estimate'] = $this->quotes_model->get_last_quote($this->input->post('name')); //GET THE ESTIMATE ID FOR THE SUMMARY PAGE
            if ($data['estimate'] != false) {
                redirect('/quotes/summary/'.$data['estimate']['estimate_id']); //REDIRECT TO THE SUMMARY PAGE
            } else {
                redirect('/quotes');
            }
        }
    }

    public function editQuote($estimateID)
    {
        //FUNCTION FOR THE EDIT FORM PAGE.
        if (isset($_SESSION['company_id']) == FALSE) {
            redirect('/profile/login');
        }

        if ($estimateID == NULL) { //IF NOT PASSED A SPECIFIC ESTIMATE REDIRECT TO THE OVERVIEW PAGE (AS NOT TO BREAK THE PAGE)
            redirect('/quotes');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        //FORM VALIDATION
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('flowMeters', 'Expected Flow', 'required|numeric|max_length[6]');
        $this->form_validation->set_rules('velocityMeters', 'Expected Velocity', 'required|numeric|max_length[6]');
        $this->form_validation->set_rules('bedSlopeDecimal', 'Bed Slope', 'required|numeric|max_length[6]');
        $this->form_validation->set_rules('sideSlopeDecimal', 'Side Slope', 'required|numeric|max_length[6]');
        $this->form_validation->set_rules('bedMeters', 'Bed Width', 'required|numeric|max_length[6]');
        if ($this->input->post('alignType')!=0) { //IF ALIGNMENT IS STRAIGHT VALIDATE THESE TOO
            $this->form_validation->set_rules('crestMeters', 'Crest Radius', 'required|numeric|max_length[6]');
            $this->form_validation->set_rules('channelMeters', 'Channel Length', 'required|numeric|max_length[6]');
            $this->form_validation->set_rules('depthMeters', 'Channel Depth', 'required|numeric|max_length[6]');
            $this->form_validation->set_rules('topMeters', 'Top Width', 'required|numeric|max_length[6]');
        }
        $this->form_validation->set_message('required', 'Please fill out the %s.');

        if ($this->form_validation->run() === FALSE) { //IF IT DOESNT VALIDATE (FRESH PAGE OR WRONG FORM) LOAD THE PAGE NORMALLY
            $data['userInfo'] = $this->quotes_model->get_company($_SESSION['company_id']);
            $data['estimate'] = $this->quotes_model->get_estimate($estimateID, $_SESSION['company_id']);
            $_SESSION['last_date'] = $data['estimate']['estimate_date'];
            if ($data['estimate']==FALSE){
                redirect('/dashboard');
            } else {
                $data['title'] = "Edit Quote | IECS";
                $data['jsLink'] = 'js/form.js';
                $data['current'] = "quotes";
                if ($this->input->get('activeStep')) {
                    $data['activeStep'] = $this->input->get('activeStep');
                }

                $this->load->view('templates/header', $data);
                $this->load->view('templates/quoteNav', $data);
                $this->load->view('quotes/edit', $data);
                $this->load->view('templates/footerNav', $data);
                $this->load->view('templates/footer', $data);
            }
        } else { //IF IT DOES VALIDATE
            $this->quotes_model->alter_quote($estimateID); //EDIT THE ESTIMATE INFO IN THE DATABASE AND REDIRECT TO THE SUMMARY
            redirect('/quotes/summary/'.$estimateID);
        }
    }

    public function summary($id)
    { //SUMMARY PAGE FUNCTION
        if (isset($_SESSION['company_id']) == FALSE) {
            redirect('/profile/login');
        }

        if ($id==NULL) { //IF NO SUMMARY IS SPECIFIED
            redirect('/dashboard');
        }

        //$data['summary'] = $this->admin_model->get_summary($id);
        $data['userInfo'] = $this->quotes_model->get_company($_SESSION['company_id']);
        $data['summaryInfo'] = $this->quotes_model->get_summary($id);
        $data['blocks'] = $this->blocks_model->get_all_blocks();
        $data['title'] = "Estimate Summary";
        $data['jsLink'] = 'js/calcpage.js';
        $data['current'] = "quotes";
        $data['activeStep'] = 5;
        $data['stepsRedirect'] = true;
        $data['id'] = $id;
        if (isset($_GET['sentEmail'])) {
            $data['sentEmail'] = true;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/quoteNav', $data);
        $this->load->view('quotes/summary', $data);
        $this->load->view('templates/footerNav', $data);
        $this->load->view('templates/footer', $data);
    }

    public function pdf($id)
    {
        if (isset($_SESSION['company_id']) == FALSE) {
            redirect('/profile/login');
        }

        if ($id==NULL) { //IF NO SUMMARY IS SPECIFIED
            redirect('/dashboard');
        }

        $_SESSION['block_data'] = json_decode($this->input->post('pdfContent'));

        $this->load->library('mpdf_library');

        $data['userInfo'] = $this->quotes_model->get_company($_SESSION['company_id']);
        $data['summaryInfo'] = $this->quotes_model->get_summary($id);
        $data['blocks'] = $this->blocks_model->get_all_blocks();
        $data['blocks_math'] = $this->input->post();
        $data['title'] = "Estimate Summary";
        $data['jsLink'] = 'js/calcpage.js';
        $data['id'] = $id;
        $this->mpdf_library->showImageErrors = true;
        $this->mpdf_library->debug = true;

        $html = $this->load->view('quotes/pdf', $data, true);

        $this->mpdf_library->load($html);
    }

    public function sendQuote($id)
    { //FUNCTION INTENDED TO RUN WHEN THE "SEND TO IECS?" IS CLICKED IN THE SUMMARY PAGE
        if (isset($_SESSION['company_id']) == FALSE) {
            redirect('/profile/login');
        }

        if ($id==NULL) {
            redirect('/dashboard');
        }

        $data['userInfo'] = $this->quotes_model->get_company($_SESSION['company_id']);
        $data['summaryInfo'] = $this->quotes_model->get_summary($id);
        $data['id'] = $id;

        //EMAIL INFORMATION
        $body = '<h3>' . $data['summaryInfo']['company_name'] . " has submitted a new design!</h3>"
            . '<a href="' . site_url('/quotes/summary/'.$id) . '">Click here log in and view the design.</a>';
        $sub = "New Design Sent from ".$data['summaryInfo']['company_name'];
        $this->email->from($data['summaryInfo']['company_email'], $data['summaryInfo']['company_contactName']); //NOT SURE IF THIS FROM FUNCTIONALITY WORKS, NEEDS TESTING
        $this->email->to($this->input->post('region'));

        $this->email->set_mailtype("html");
        $this->email->subject($sub);
        $this->email->message($body);

        $this->email->send();
        $this->quotes_model->alter_sent_state($id);
        redirect('/quotes/summary/'.$id.'?sentEmail=true');
    }


    public function ajaxSummary()
    { //FUNCTION FOR PASSING SUMMARY DATA TO THE AJAX FUNCTION ON THE SUMMARY PAGE.
        if (isset($_GET['id'])) {
            $data['estimate'] = $this->quotes_model->get_summary_data($_GET['id']);
            echo json_encode($data['estimate']);
        }
    }

}

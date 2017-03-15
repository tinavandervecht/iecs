<?php
class Quotes extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('quotes_model');
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
          $data['userInfo'] = $this->quotes_model->get_company($_SESSION['company_id']);
          $data['estimatesInfo'] = $this->quotes_model->get_estimateHistory($_SESSION['company_id']);

          $data['title'] = "Quotes | IECS";
          $data['jsLink'] = 'js/quotes.js';
          $data['current'] = "quotes";

          $this->load->view('templates/header', $data);
          $this->load->view('templates/nav', $data);
          $this->load->view('quotes/view', $data);
          $this->load->view('templates/footerNav', $data);
          $this->load->view('templates/footer', $data);
  }

      public function deleteQuote($estimateID, $location){
        $this->quotes_model->delete_quote($estimateID);
        redirect('/'.$location);
      }

      public function newQuote(){

      if (isset($_SESSION['company_id']) == FALSE){
      redirect('/profile/login');
    }

    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('flowMeters', 'Expected Flow', 'required|numeric|max_length[6]');
    $this->form_validation->set_rules('velocityMeters', 'Expected Velocity', 'required|numeric|max_length[6]');
    $this->form_validation->set_rules('bedSlopeDecimal', 'Bed Slope', 'required|numeric|max_length[6]');
    $this->form_validation->set_rules('sideSlopeDecimal', 'Side Slope', 'required|numeric|max_length[6]');
    $this->form_validation->set_rules('bedMeters', 'Bed Width', 'required|numeric|max_length[6]');
    $this->form_validation->set_rules('crestMeters', 'Crest Radius', 'required|numeric|max_length[6]');
    $this->form_validation->set_rules('channelMeters', 'Channel Length', 'required|numeric|max_length[6]');
    $this->form_validation->set_rules('depthMeters', 'Channel Depth', 'required|numeric|max_length[6]');
    $this->form_validation->set_rules('topMeters', 'Top Width', 'required|numeric|max_length[6]');
    $this->form_validation->set_message('required', 'Please fill out the %s.');



    if ($this->form_validation->run() === FALSE){
    $data['userInfo'] = $this->quotes_model->get_company($_SESSION['company_id']);
    $data['title'] = "New Quote | IECS";
    $data['jsLink'] = 'js/form.js';
    $data['current'] = "quotes";

    $this->load->view('templates/header', $data);
    $this->load->view('templates/quoteNav', $data);
    $this->load->view('quotes/new', $data);
    $this->load->view('templates/footerNav', $data);
    $this->load->view('templates/footer', $data);
  }

    else {
      $this->quotes_model->set_quote();
      redirect('/quotes');
    }

  }

  public function editQuote($estimateID){

  if (isset($_SESSION['company_id']) == FALSE){
  redirect('/profile/login');
  }

  if ($estimateID == NULL){
    redirect('/quotes');
  }

    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('flowMeters', 'Expected Flow', 'required|numeric|max_length[6]');
    $this->form_validation->set_rules('velocityMeters', 'Expected Velocity', 'required|numeric|max_length[6]');
    $this->form_validation->set_rules('bedSlopeDecimal', 'Bed Slope', 'required|numeric|max_length[6]');
    $this->form_validation->set_rules('sideSlopeDecimal', 'Side Slope', 'required|numeric|max_length[6]');
    $this->form_validation->set_rules('bedMeters', 'Bed Width', 'required|numeric|max_length[6]');
    $this->form_validation->set_rules('crestMeters', 'Crest Radius', 'required|numeric|max_length[6]');
    $this->form_validation->set_rules('channelMeters', 'Channel Length', 'required|numeric|max_length[6]');
    $this->form_validation->set_rules('depthMeters', 'Channel Depth', 'required|numeric|max_length[6]');
    $this->form_validation->set_rules('topMeters', 'Top Width', 'required|numeric|max_length[6]');
    $this->form_validation->set_message('required', 'Please fill out the %s.');



    if ($this->form_validation->run() === FALSE){
    $data['userInfo'] = $this->quotes_model->get_company($_SESSION['company_id']);
    $data['estimate'] = $this->quotes_model->get_estimate($estimateID, $_SESSION['company_id']);
    $this->session->set_userdata('last_date', $data['estimate']['estimate_date']);
    if ($data['estimate']==FALSE){
      redirect('/dashboard');
      }
    else{
      $data['title'] = "Edit Quote | IECS";
      $data['jsLink'] = 'js/form.js';
      $data['current'] = "quotes";

      $this->load->view('templates/header', $data);
      $this->load->view('templates/quoteNav', $data);
      $this->load->view('quotes/edit', $data);
      $this->load->view('templates/footerNav', $data);
      $this->load->view('templates/footer', $data);
    }

    }

    else {
      $this->quotes_model->alter_quote($estimateID);
      redirect('/quotes');
    }

  }

  public function summary($id){

    if (isset($_SESSION['company_id']) == FALSE)
  {
    redirect('/profile/login');
  }

    if ($id==NULL) {

      redirect('/dashboard');
    }

    //$data['summary'] = $this->admin_model->get_summary($id);
    $data['userInfo'] = $this->quotes_model->get_company($_SESSION['company_id']);
    $data['title'] = "Estimate Summary";
    $data['jsLink'] = 'js/cms_estimate_summary.js';
    $data['current'] = "quotes";

    $this->load->view('templates/header', $data);
    $this->load->view('templates/nav', $data);
    $this->load->view('quotes/summary', $data);
    $this->load->view('templates/footerNav', $data);
    $this->load->view('templates/footer', $data);

}


}

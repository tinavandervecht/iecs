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

      public function newQuote(){

      if (isset($_SESSION['company_id']) == FALSE){
      redirect('/profile/login');
    }

    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('flowMeters', 'Expected Flow', 'required|decimal|max_length[6]');
    $this->form_validation->set_rules('velocityMeters', 'Expected Velocity', 'required|decimal|max_length[6]');
    $this->form_validation->set_rules('bedSlopeDecimal', 'Bed Slope', 'required|decimal|max_length[6]');
    $this->form_validation->set_rules('sideSlopeDecimal', 'Side Slope', 'required|decimal|max_length[6]');
    $this->form_validation->set_rules('flowType', 'Flow Type', 'required');
    $this->form_validation->set_rules('bedMeters', 'Bed Width', 'required|decimal|max_length[6]');
    $this->form_validation->set_rules('alignType', 'Alignment', 'required');
    $this->form_validation->set_rules('crestMeters', 'Crest Radius', 'required|decimal|max_length[6]');
    $this->form_validation->set_rules('channelMeters', 'Channel Length', 'required|decimal|max_length[6]');
    $this->form_validation->set_rules('depthMeters', 'Channel Depth', 'required|decimal|max_length[6]');
    $this->form_validation->set_rules('topMeters', 'Top Width', 'required|decimal|max_length[6]');
    $this->form_validation->set_rules('sourceType', 'Outlet Source', 'required');
    $this->form_validation->set_rules('soilType', 'Soil Type', 'required');
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

$this->load->helper('form');
$this->load->library('form_validation');

$this->form_validation->set_rules('name', 'Name', 'required');
$this->form_validation->set_rules('flowMeters', 'Expected Flow', 'required|decimal|max_length[6]');
$this->form_validation->set_rules('velocityMeters', 'Expected Velocity', 'required|decimal|max_length[6]');
$this->form_validation->set_rules('bedSlopeDecimal', 'Bed Slope', 'required|decimal|max_length[6]');
$this->form_validation->set_rules('sideSlopeDecimal', 'Side Slope', 'required|decimal|max_length[6]');
$this->form_validation->set_rules('flowType', 'Flow Type', 'required');
$this->form_validation->set_rules('bedMeters', 'Bed Width', 'required|decimal|max_length[6]');
$this->form_validation->set_rules('alignType', 'Alignment', 'required');
$this->form_validation->set_rules('crestMeters', 'Crest Radius', 'required|decimal|max_length[6]');
$this->form_validation->set_rules('channelMeters', 'Channel Length', 'required|decimal|max_length[6]');
$this->form_validation->set_rules('depthMeters', 'Channel Depth', 'required|decimal|max_length[6]');
$this->form_validation->set_rules('topMeters', 'Top Width', 'required|decimal|max_length[6]');
$this->form_validation->set_rules('sourceType', 'Outlet Source', 'required');
$this->form_validation->set_rules('soilType', 'Soil Type', 'required');
$this->form_validation->set_message('required', 'Please fill out the %s.');



if ($this->form_validation->run() === FALSE){
$data['userInfo'] = $this->quotes_model->get_company($_SESSION['company_id']);
$data['estimate'] = $this->quotes_model->get_estimate($estimateID, $_SESSION['company_id']);
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


}

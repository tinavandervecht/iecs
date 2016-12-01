<?php
class History extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('history_model');
                $this->load->helper('url_helper');
        }

        public function index()
{
        $data['tbl_company'] = $this->history_model->get_estimateHistory();
        $data['title'] = 'Estimates';

        $this->load->view('templates/header', $data);
        $this->load->view('history/index', $data);
        $this->load->view('templates/footer');
}

public function views($companyID = NULL)
{
$data['userInfo'] = $this->history_model->get_estimateHistory($companyID);

if (empty($data['userInfo']))
{
        show_404();
}

$data['title'] = $data['userInfo'][0]['company_contactName'];

$this->load->view('templates/header', $data);
$this->load->view('history/view', $data);
$this->load->view('templates/footer');
}


}

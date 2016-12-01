<?php
class Erosion extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('erosion_model');
                $this->load->helper('url_helper');
        }

        public function index()
{
        $data['tbl_company'] = $this->erosion_model->get_company();
        $data['title'] = 'Companies';

        $this->load->view('templates/header', $data);
        $this->load->view('erosion/index', $data);
        $this->load->view('templates/footer');
}
}

<?php
class Blocks extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->model('blocks_model');
    }

    public function get()
    {
        echo json_encode($this->blocks_model->get_all_blocks());
    }
}

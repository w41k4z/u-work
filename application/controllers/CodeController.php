<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CodeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CodeModel');
    }

    private function viewer($page, $data)
    {
        $data = array(
            'page' => $page,
            'data' => $data
        );
        $this->load->view('template/BasePage', $data);
    }

    public function index()
    {
        $data = array();
        $data['pending_validations'] = $this->CodeModel->pending_validation();
        $this->viewer('validation/verification', $data);
    }

    public function validation($pending_validation_id)
    {
        $this->CodeModel->validate($pending_validation_id);
    }
}

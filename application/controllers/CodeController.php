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

    public function validation()
    {
        $code = $this->input->post('code');
        // Check if code is valide
        $valide = $this->CodeModel->code_valide($code);
        // update code 
        $valide = $this->CodeModel->code_valider($code);
        // loading view or redirecting
    }
}

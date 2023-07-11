<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AutentificationModel');
    }
	// --------------------------------------------------
	public function index()
	{
		$this->load->view('authentification/login');
	}
    public function login(){
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        $valiny = $this->AutentificationModel->autentification($mail,$mdp);
        if($valiny != null){
            $_SESSION['userdata'] = $valiny[0]['id'];
            redirect('IndexController/index');
        }
        else{
            $this->load->view('autentifications/Login');
        }
	}
	// --------------------------------------------------
}
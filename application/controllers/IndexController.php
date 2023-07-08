<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndexController extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->session->set_userdata('session', 'Sessions are working');
		$this->load->view('home_page');
	}

	public function test()
	{
		$data = array();
		$data['session'] = $this->session->userdata('session');
		$data['students'] = $this->db->query('SELECT * FROM etudiant')->result_array();
		$this->load->view('test/test_page', $data);
	}
}
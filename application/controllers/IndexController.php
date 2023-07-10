<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IndexController extends CI_Controller
{
	public function index()
	{
		$this->session->set_userdata('session', 'Sessions are working');
		$this->load->view('home_page');
	}

	public function test()
	{
		$data = array();
		$data['session'] = $this->session->userdata('session');
		$data['students'] = $this->db->query('SELECT * FROM test')->result_array();
		$this->load->view('test/test_page', $data);
	}
}

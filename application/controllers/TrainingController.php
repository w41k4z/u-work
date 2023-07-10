<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TrainingController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TrainingModel');
	}

	private function viewer($page, $data)
	{
		$data = array(
			'page' => $page,
			'data' => $data
		);
		$this->load->view('template/BasePage', $data);
	}

	public function page($page)
	{
		$data = array();
		$data['activities'] = $this->TrainingModel->activities();
		$this->viewer('activite/' . $page, $data);
	}

	public function new_activity()
	{
		$activity_name = $this->input->post('nom');
		// creating new activities
		$activity_id = $this->TrainingModel->insert_activity($activity_name);
		redirect('TrainingController');
	}

	public function new_training()
	{
		$difficulty = $this->input->post('niveau');
		// creating new training
		$training_id = $this->TrainingModel->insert_training($difficulty);

		$activities = $this->input->post('activites');
		$quantities = $this->input->post('quantites');
		var_dump($activities);
		for ($i = 0; $i < count($activities); $i++) {
			$this->TrainingModel->insert_training_activity($training_id, $activities[$i], $quantities[$i]);
		}

		redirect("TrainingController");
	}
}

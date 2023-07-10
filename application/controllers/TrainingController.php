<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TrainingController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('TrainingModel');
	}

	public function new_activity()
	{
		$activity_name = $this->input->post('nom');
		// creating new activities
		$activity_id = $this->TrainingModel->insert_activities($activity_name);
	}

	public function new_training()
	{
		$difficulty = $this->input->post('niveau');
		// creating new training
		$training_id = $this->TrainingModel->insert_training($difficulty);
	}
}

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
		$data['trainings'] = $this->TrainingModel->trainings();
		$this->viewer('activite/' . $page, $data);
	}

	public function delete_activity()
	{
		$this->TrainingModel->delete_training_activity($this->input->post('id_training_activity'));
	}

	public function delete_training()
	{
		$this->TrainingModel->delete_training($this->input->post('training_id'));
	}

	public function update_activity()
	{
		$training_activity = $this->TrainingModel->get_training_activity_by_id($this->input->post('id_training_activity'));
		// var_dump($training);
		$training_data = array(
			'id' => $this->input->post('id_training_activity'),
			'id_entrainement' => $training_activity->id_entrainement,
			'id_activite' => $this->input->post('id_activite'),
			'quantite' => $this->input->post('quantite')
		);
		var_dump($training_data);
		$this->TrainingModel->update_activity($training_data);
	}

	public function training_udpate_form($training_id)
	{
		$training = $this->TrainingModel->get_training_by_id($training_id);
		$data = array();
		$data['training'] = $training;
		$this->viewer('activite/update', $data);
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

		redirect("TrainingController/page/training");
	}
}

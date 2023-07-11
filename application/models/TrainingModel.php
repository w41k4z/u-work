<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TrainingModel extends CI_Model
{

	public function activities()
	{
		return $this->db->get('activite')->result();
	}

	public function get_training_by_id($training_id)
	{
		$training = $this->db->get_where('entrainement', array('id' => $training_id))->row();
		$training->str_niveau = $this->get_str_level($training->niveau);
		$training->activites = $this->get_training_activities($training->id);
		return $training;
	}

	public function get_training_activity_by_id($id_training_activity)
	{
		return $this->db->get_where('activite_entrainement', array('id' => $id_training_activity))->row();
	}

	public function delete_training_activity($id_training_activity)
	{
		$this->db->where('id', $id_training_activity);
		$this->db->delete('activite_entrainement');
	}

	public function delete_training($training_id)
	{
		$this->db->where('id_entrainement', $training_id);
		$this->db->delete('activite_entrainement');

		$this->db->where('id', $training_id);
		$this->db->delete('entrainement');
	}

	public function update_activity($training_activity)
	{
		$this->db->where('id', $training_activity['id']);
		$this->db->update('activite_entrainement', $training_activity);
	}

	public function update($training)
	{
		$this->db->where('id', $training['id']);
		$this->db->update('entrainement', $training);
	}

	public function trainings()
	{
		$trainings = $this->db->get('entrainement')->result();
		foreach ($trainings as $training) {
			$training->str_niveau = $this->get_str_level($training->niveau);
			$training->activites = $this->get_training_activities($training->id);
		}
		return $trainings;
	}

	public function get_str_level($level)
	{
		if ($level > 0 && $level < 5) {
			return "Facile";
		} else if ($level > 4 && $level < 10) {
			return "Moyen";
		} else if ($level > 9) {
			return "Difficile";
		} else {
			return "N/A";
		}
	}

	public function get_training_activities($training_id)
	{
		return $this->db->get_where('activites_entrainement', array('id_entrainement' => $training_id))->result();
	}

	public function insert_activity($name)
	{
		$data = array();
		$data['nom'] = $name;
		$this->db->insert('activite', $data);
		return $this->db->insert_id();
	}

	public function insert_training($difficulty)
	{
		$data = array();
		$data['niveau'] = $difficulty;
		$this->db->insert('entrainement', $data);
		return $this->db->insert_id();
	}

	public function insert_training_activity($training_id, $activity_id, $quantity)
	{
		$data = array();
		$data['id_entrainement'] = $training_id;
		$data['id_activite'] = $activity_id;
		$data['quantite'] = $quantity;
		$this->db->insert('activite_entrainement', $data);
		return $this->db->insert_id();
	}
}

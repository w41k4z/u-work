<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TrainingModel extends CI_Model
{

	public function activities()
	{
		return $this->db->get('activite')->result();
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

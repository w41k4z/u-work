<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ActivitiesModel extends CI_Model
{
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
}

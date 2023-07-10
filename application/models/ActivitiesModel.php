<?php
	define ('BASEPATH') or exit ('No direct script access allowed');

	class ActivitiesModel extends CI_Model
	{
		public function insert_activities($type, $duree)
		{
			$data = array();
			$data['type'] = $type;
			$data['duree'] = $duree;
			$this->db->insert('table',$data);
			return $this->db->insert_id();
		}

		public function insert_detail_activities($activity_id, $diet_detail_id)
		{
			$activity = $this->db->get_where('activite', array('idActivite' => $activity_id))->row;
			$diet_detail = $this->db->get_where('detailRegime', array('idDetailRegime' => $diet_detail_id))->row;
			if (!$activity || !$diet_detail) {
				throw new Exception('The diet or component you are referencing does not exist');
			}
	
			$data = array();
			$data['idregime'] = $activity_id;
			$data['idcomposant'] = $diet_detail_id;
			$this->db->insert('detailregime', $data);
			return $this->db->insert_id();
		}
	}
	
?>
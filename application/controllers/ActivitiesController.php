<?php
	define ('BASEPATH') or exit ('No direct script access allowed');

	class ActivitiesController extends CI_Controller 
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('DietModel');
		}

		public function create_activities()
		{
			$activity_name = $this->input->post('nom');
			$duration_in_day = $this->input->post('duree');
			// creating new activities
			$activity_id = $this->ActivitiesModel->insert_activities($activity_name, $duration_in_day);

			// inserting activities details
			$details = $this->input->post('detailActivite');
			foreach ($details as $detail) {
				$this->ActivitiesModel->insert_detail_activities($activity_id, $detail);
			}
		}
	}
	

?>
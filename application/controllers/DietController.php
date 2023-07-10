<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DietController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DietModel');
    }

    public function new_diet()
    {
        $diet_name = $this->input->post('nom');
        $frequency = $this->input->post('nombre_repas');
        // creating new diet
        $diet_id = $this->DietModel->new_diet($diet_name, $frequency);

        // inserting diet details
        $components = $this->input->post('composants');
        foreach ($components as $component) {
            $this->DietModel->new_diet_detail($diet_id, $component);
        }

        // loading view or redirecting
    }

    public function new_diet_princing()
    {
        $diet_id = $this->input->post('idregime');
        $daily_price = $this->input->post('prix');
        $duration_in_day = $this->input->post('duree');
        $weight_target = $this->input->post('poids');
        $this->DietModel->new_diet_pricing($diet_id, $daily_price, $duration_in_day, $weight_target);
        // loading view or redirecting
    }
}

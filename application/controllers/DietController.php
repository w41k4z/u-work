<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DietController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DietModel');
    }

    private function viewer($page, $data)
    {
        $data = array(
            'page' => $page,
            'data' => $data
        );
        $this->load->view('template/BasePage', $data);
    }
    public function index()
    {

        $this->viewer('regime/insertion', []);
    }

    public function new_diet()
    {
        $diet_name = $this->input->post('regime');
        $frequency = $this->input->post('repas');
        // creating new diet
        $diet_id = $this->DietModel->new_diet($diet_name, $frequency);
        // inserting diet details
        $components = $this->input->post('composants');
        $components = json_decode(str_replace("'", "", $components));
        for ($i = 0; $i < count($components); $i++) {
            $this->DietModel->new_diet_detail($diet_id, $components[$i]);
        }
    }


    // public function new_diet_princing()
    // {
    //     $diet_id = $this->input->post('idregime');
    //     $daily_price = $this->input->post('prix');
    //     $duration_in_day = $this->input->post('duree');
    //     $weight_target = $this->input->post('poids');
    //     $this->DietModel->new_diet_pricing($diet_id, $daily_price, $duration_in_day, $weight_target);
    //     // loading view or redirecting
    // }

    public function testInsert()
    {
        $regime_choice = $this->input->post('option');
        $coste = $this->input->post('prix');
        $time = $this->input->post('duree');
        $weight = $this->input->post('poids');

        $data = array(
            'choix' => $regime_choice,
            'cout' => $coste,
            'temps' => $time,
            'poid' => $weight
        );

        // afficher les resultats
        $this->load->view('test/test_page', $data);
    }
}

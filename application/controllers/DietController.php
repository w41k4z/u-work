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

        $this->viewer('regime/regime', []);
    }

    public function page($page)
    {
        $this->viewer('regime/' . $page, []);
    }

    public function new_diet()
    {
        $diet_name = $this->input->post('regime');
        $categorie = $this->input->post('type');
        $prix = $this->input->post('prix');
        $debut = $this->input->post('debut');
        $fin = $this->input->post('fin');
        $duree = $this->input->post('duree');
        $p_viande = $this->input->post('p_viande');
        $p_poisson = $this->input->post('p_poisson');
        $p_volaille = $this->input->post('p_volaille');

        // creating new diet
        $diet_id = $this->DietModel->new_diet($diet_name, $categorie, $duree, $debut, $fin, $prix, $p_viande, $p_poisson, $p_volaille);
        // inserting diet details
        // var_dump($diet_id);
        $components = $this->input->post('regimeDetail');
        $components = json_decode(str_replace("'", "", $components));
        for ($i = 0; $i < count($components); $i++) {
            // var_dump($components[$i]);
            $this->DietModel->new_diet_detail($diet_id, $components[$i]->jour, $components[$i]->matin, $components[$i]->midi, $components[$i]->soir, $components[$i]->activites);
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

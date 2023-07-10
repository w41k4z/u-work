<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DietModel extends CI_Model
{
    public function new_diet($name, $frequency)
    {
        $data = array();
        $data['nom'] = $name;
        $data['nombre_repas'] = $frequency;
        $this->db->insert('regime', $data);
        return $this->db->insert_id();
    }

    public function new_diet_detail($diet_id, $composant_id)
    {
        $diet = $this->db->get_where('regime', array('idregime' => $diet_id))->row;
        $composant = $this->db->get_where('composant', array('idcomposant' => $composant_id))->row;
        if (!$diet || !$composant) {
            throw new Exception('The diet or component you are referencing does not exist');
        }

        $data = array();
        $data['idregime'] = $diet_id;
        $data['idcomposant'] = $composant_id;
        $this->db->insert('detailregime', $data);
        return $this->db->insert_id();
    }

    public function new_diet_pricing($diet_id, $daily_price, $duration_in_day, $weight_target)
    {
        $diet = $this->db->get_where('regime', array('idregime' => $diet_id))->row;
        if (!$diet) {
            throw new Exception('The diet you are referencing does not exist');
        }

        $data = array();
        $data['idregime'] = $diet_id;
        $data['prix'] = $daily_price;
        $data['duree'] = $duration_in_day;
        $data['poids'] = $weight_target;
        $this->db->insert('tarificationregime', $data);
        return $this->db->insert_id();
    }
}

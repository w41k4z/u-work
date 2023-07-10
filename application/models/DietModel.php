<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DietModel extends CI_Model
{
    public function selectPlat(){
        $data = array();
        $sql = "select * from plat";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $row){
            $data [] = $row;
        }
        return $data;
    }
    public function selectCategorieRegime(){
        $data = array();
        $sql = "select * from categorie_regime";
        $query = $this->db->query($sql);
        foreach($query->result_array() as $row){
            $data [] = $row;
        }
        return $data;
    }
    public function new_diet($name, $categorie,$duree,$debut,$fin,$prix)
    {
        /* id | nom | id_categorie | duree | de | a | prix */
        $data = array();
        $data['nom'] = $name;
        $data['id_categorie'] = $categorie;
        $data['duree'] = $duree;
        $data['de'] = $debut;
        $data['a'] = $fin;
        $data['prix'] = $prix;
        $this->db->insert('regime', $data);
        return $this->db->insert_id();
    }
    public function new_diet_detail($diet_id, $jour,$id_plat_matin,$id_plat_midi,$id_plat_soir,$id_entrainement)
    {
        $data = array();
        $data['idregime'] = $diet_id;
        $data['jour'] = $jour;
        $data['id_plat_matin'] = $id_plat_matin;
        $data['id_plat_midi'] = $id_plat_midi;
        $data['id_plat_soir'] = $id_plat_soir;
        $data['id_entrainement'] = $id_entrainement;
        $this->db->insert('detail_regime', $data);
        return $this->db->insert_id();
    }
}

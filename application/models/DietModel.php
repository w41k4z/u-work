<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DietModel extends CI_Model
{
    public function selectPlat()
    {
        $data = array();
        $sql = "select * from plat";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    public function selectCategorieRegime()
    {
        $data = array();
        $sql = "select * from categorie_regime";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    public function new_diet($name, $categorie, $duree, $debut, $fin, $prix, $p_viande, $p_poisson, $p_volaille)
    {
        /* id | nom | id_categorie | duree | de | a | prix */
        $data = array();
        // $data['id'] = nul;
        $data['nom'] = $name;
        $data['id_categorie'] = $categorie;
        $data['duree'] = $duree;
        $data['de'] = $debut;
        $data['a'] = $fin;
        $data['prix'] = $prix;
        $data['pourcentage_viande'] = $p_viande;
        $data['pourcentage_poisson'] = $p_poisson;
        $data['pourcentage_volaille'] = $p_volaille;
        $this->db->insert('regime', $data);
        return $this->db->insert_id();
    }
    public function new_diet_detail($diet_id, $jour, $id_plat_matin, $id_plat_midi, $id_plat_soir, $id_entrainement)
    {
        $data = array();
        $data['id_regime'] = $diet_id;
        $data['jour'] = $jour;
        $data['id_plat_matin'] = $id_plat_matin;
        $data['id_plat_midi'] = $id_plat_midi;
        $data['id_plat_soir'] = $id_plat_soir;
        $data['id_entrainement'] = $id_entrainement;
        $this->db->insert('detail_regime', $data);
        return $this->db->insert_id();
    }

    public function all_diet()
    {
        $diets = $this->db->get('regimes')->result();
        foreach ($diets as $diet) {
            $diet->details_regimes = $this->all_diet_detail($diet->id);
        }
        return $diets;
    }

    public function all_diet_detail($diet_id)
    {
        return $this->db->get_where('details_regimes', array('id_regime' => $diet_id))->result();
    }

    public function all_diet_category()
    {
        return $this->db->get('categorie_regime')->result();
    }

    public function all_plat()
    {
        return $this->db->get('plat')->result();
    }

    public function all_training()
    {
        return $this->db->get('entrainement')->result();
    }

    public function remove_diet($id)
    {
        $this->db->where('id_regime', $id);
        $this->db->delete('detail_regime');

        $this->db->where('id', $id);
        $this->db->delete('regime');
    }
}

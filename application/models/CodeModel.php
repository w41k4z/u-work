<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CodeModel extends CI_Model
{

    public function code_valide($codeentrer)
    {
        $data = array();
        $sql = "select * from code where etat < 11 and  idcode = %s";
        $sql = sprintf($sql, $codeentrer);
        $query = $this->db->query($sql);
        if (!$query) {
            throw new Exception('The code you are referencing is already used');
        } else {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function code_valider($codeentrer)
    {
        $sql = "update code set etat = 11 where idcode = %s";
        $sql = sprintf($sql, $codeentrer);
        $query = $this->db->query($sql);
    }

    public function pending_validation()
    {
        return $this->db->get('pending_code_validation')->result();
    }
}

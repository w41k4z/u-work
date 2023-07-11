<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AutentificationModel extends CI_Model{
    public function autentification($mail,$passWord){
        $data = array();
        $sql = "select * from user_account where email = '".$mail."' and password = '".$passWord."'";
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

}

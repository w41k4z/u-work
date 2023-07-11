<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CodeModel extends CI_Model
{

    public function code_valide($codeentrer)
    {
        $code_db = $this->db->get_where('code', array('code' => $codeentrer))->row();
        if (!$code_db || $code_db->state > 10) {
            throw new Exception('Code non utilisable');
        }
    }

    public function code_valider($codeentrer)
    {
        $sql = "update code set state = 11 where code = '%s'";
        $sql = sprintf($sql, $codeentrer);
        $query = $this->db->query($sql);
    }

    public function validate($pending_validation_id)
    {
        $this->db->trans_start();

        $pending_validation = $this->db->get_where('pending_validation', array('id' => $pending_validation_id))->row();

        $this->code_valide($pending_validation->code);

        $pending_validation->state = 11;
        $this->db->where('id', $pending_validation_id);
        $this->db->update('pending_validation', $pending_validation);

        $this->code_valider($pending_validation->code);

        $pending_validation->user = $this->get_user_by_id($pending_validation->user_account_id);

        $code = $this->db->get_where('code', array('code' => $pending_validation->code))->row();
        // updating user money
        $user_incom_flow = array(
            'user_account_id' => $pending_validation->user_account_id,
            'action_date' => date('Y-m-d H:i:s'),
            'amount' => $code->value
        );
        $this->db->insert('user_income_flow', $user_incom_flow);

        $this->db->trans_commit();
        $this->db->trans_off();
    }

    public function pending_validation()
    {
        $query = "SELECT * FROM pending_validation WHERE state < 11";
        $pending_invitations = $this->db->query($query)->result();
        foreach ($pending_invitations as $pending_invitation) {
            $pending_invitation->user = $this->get_user_by_id($pending_invitation->user_account_id);
        }
        return $pending_invitations;
    }

    public function get_user_by_id($user_id)
    {
        return $this->db->get_where('user_account', array('id' => $user_id))->row();
    }
}

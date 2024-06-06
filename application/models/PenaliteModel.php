<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PenaliteModel extends CI_Model {

    function InsertionPenalite($idetape,$idequipe,$temps){
        $data = array(
            'idetape' => $idetape,
            'idequipe' =>  $idequipe,
            'temps' =>  $temps
        );
        
        $this->db->insert('penalite', $data);
    }

    public function SupprimerPenalite($idpenalite){
        $query = "delete from penalite where idpenalite = " . $idpenalite;
        $this->db->query($query);
    }

    function SelectPenalite(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('v_penalite');
        $query = $this->db->get();
        return $query->result();
    }

}
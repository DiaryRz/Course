<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ReinitialiserModel extends CI_Model {

    function InitialiserDonnees(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('effacer_donnees_sauf_admin()');
        $query = $this->db->get();
        return $query->result();
    }

}
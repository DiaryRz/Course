<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginModel extends CI_Model {

    function SelectEquipe(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('equipe');
        $query = $this->db->get();
        return $query->result();
    }

    function SelectAdmin(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('admin');
        $query = $this->db->get();
        return $query->result();
    }
}
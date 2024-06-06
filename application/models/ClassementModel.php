<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ClassementModel extends CI_Model {

    function Selectclassementgeneralparetape($idetape){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('classementgeneralparetape');
        $this->db->where('idetape' , $idetape);
        $query = $this->db->get();
        return $query->result();
    }

    function Selectclassementequipe(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('classementequipe');
        $query = $this->db->get();
        return $query->result();
    }

    function SelectEtape($idetape){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('etape');
        $this->db->where('idetape' , $idetape);
        $query = $this->db->get();
        return $query->row();
    }

    public function Selectclassementparcategorie(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('classementparcategorie');
        $query = $this->db->get();
        return $query->result();
    }


    public function AvoirEquipeGagnant(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('classementequipe');
        $this->db->order_by('rang' , 'asc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    // Classement an'ny joueur rehetra @ etape

    public function classementgeneralparetape($idequipe){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('classementgeneralparetape');
        $this->db->where('idequipe' , $idequipe);
        $this->db->order_by('points' , 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    public function Certificat(){
        $EquipeGagnant = $this->AvoirEquipeGagnant() ;
        $Gagnant = $this->classementgeneralparetape($EquipeGagnant->idequipe) ;
        return $Gagnant;
    }

    public function datepournom(){
        $date = new DateTime(); 
		$datenow = $date->format('Y-m-d H:i:s');
		$dt = explode(" ", $datenow);
		$heure = explode(":", $dt[1]) ;
		$h = $heure[0].$heure[1].$heure[2];
		$dtn = $dt[0].$h;
        return $dtn;
    }


    public function SelectRangMitovy($idcategorie){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('execo');
        $this->db->where('idcategorie' , $idcategorie);
        $query = $this->db->get();
        return $query->result();
    }

    public function detailsgeneral($idequipe){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('resultatparequipe');
        $this->db->where('idequipe' , $idequipe);
        $query = $this->db->get();
        return $query->result();
    }
}
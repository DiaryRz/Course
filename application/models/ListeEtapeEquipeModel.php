<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ListeEtapeEquipeModel extends CI_Model {

    function SelectEtape($limit, $offset){
        $this->load->database();
        $this->db->select('*');
        $this->db->limit($limit, $offset);
        $this->db->from('v_etape');
        $query = $this->db->get();
        return $query->result();
    }

    function SelectEtapeSansPagination(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('v_etape');
        $query = $this->db->get();
        return $query->result();
    }

    function SelectEtapeAvecTempsCoureur(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('etapeavectempscoureur');
        $query = $this->db->get();
        return $query->result();
    }

    public function NombreEtape() {
        return $this->db->count_all('v_etape');
    }

    function SelectCoureurDuMemeEquipe($idequipe){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('coureur');
        $this->db->where('idequipe' , $idequipe);
        $query = $this->db->get();
        return $query->result();
    }

    public function insertcoureurauneetape($idetape,$listecoureur){
        foreach ($listecoureur as $coureur) {
            $data = array(
                'idetape' => $idetape,
                'idcoureur' =>  $coureur
            );
            
            $this->db->insert('coureuretape', $data);
        }
    }

    function SelectCoureurParEtape($idetape){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('v_coureuretape');
        $this->db->where('idetape' , $idetape);
        $query = $this->db->get();
        return $query->result();
    }

    function SelectCoureurParIdCoureur($idcoureur){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('v_coureur');
        $this->db->where('idcoureur' , $idcoureur);
        $query = $this->db->get();
        return $query->result();
    }

    function SelectEtapeParIdEtape($idetape){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('etape');
        $this->db->where('idetape' , $idetape);
        $query = $this->db->get();
        return $query->row();
    }
 
    function SelectCoureurEtapeParCoureurParEtape($idetape,$idcoureur){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('coureuretape');
        $this->db->where('idetape' , $idetape);
        $this->db->where('idcoureur' , $idcoureur);
        $query = $this->db->get();
        return $query->row();
    }

    public function insererDeroulementCourse($data) {
        try {
            $this->db->trans_start();
        
            foreach ($data as $coureur) {
                $idetape = $coureur['idetape'];
                $idcoureur = $coureur['idcoureur'];
                $idcoureuretape = $this->SelectCoureurEtapeParCoureurParEtape($idetape, $idcoureur)->idcoureuretape;
        
                if ($idcoureuretape !== null) {
                    // Combine the date and time to create DateTime objects
                    $datetime_depart = new DateTime($coureur['datedepart']  . ' ' . $coureur['heureetape']);
                    $datetime_arrive = new DateTime($coureur['datearrive'] . ' ' . $coureur['heurearrive']);
        
                    $interval = $datetime_depart->diff($datetime_arrive);
                    $duree = $interval->s + ($interval->i * 60) + ($interval->h * 3600) + ($interval->d * 86400);
        
                    // Prepare the data to insert
                    $insert_data = array(
                        'idcoureuretape' => $idcoureuretape,
                        'heuredepart' => $datetime_depart->format('H:i:s'),
                        'datedepart' => $coureur['datedepart'],
                        'datearrive' => $coureur['datearrive'],
                        'heurearrive' => $datetime_arrive->format('H:i:s'),
                        'duree' => $duree
                    );
        
                    // Insert the data
                    $this->db->insert('deroulementcourse', $insert_data);
                }
            }
        
            // Si tout va bien, validez les changements
            $this->db->trans_complete();
    
        } catch (Exception $e) {
            // En cas d'erreur, annulez les changements
            $this->db->trans_rollback();
            echo "Une erreur est survenue : " . $e->getMessage();
        }
    }
    
    // Select nombre de coureur par etape et par equipe
    public function Selectnombrecoureuretapequipe($idetape,$idequipe){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('nombrecoureuretapequipe');
        $this->db->where('idetape' , $idetape);
        $this->db->where('idequipe' , $idequipe);
        $query = $this->db->get();
        return $query->row();
    }

    public function VerificationTempsCoureur($idetape,$idcoureur){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('v_deroulementcourse');
        $this->db->where('idetape' , $idetape);
        $this->db->where('idcoureur' , $idcoureur);
        $query = $this->db->get();
        return $query->result();
    }

    public function VerificationSiCoureurEstDejaDansLEtape($idetape,$idcoureur){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('coureuretape');
        $this->db->where('idetape' , $idetape);
        $this->db->where('idcoureur' , $idcoureur);
        $query = $this->db->get();
        return $query->result();
    }

}
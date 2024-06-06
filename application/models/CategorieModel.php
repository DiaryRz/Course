<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CategorieModel extends CI_Model {

    function SelectCategorie(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('categorie');
        $query = $this->db->get();
        return $query->result();
    }

    function SelectCoureurAvecAge(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('v_coureuravecage');
        $query = $this->db->get();
        return $query->result();
    }

    // public function insererCategorie($idcoureur,$idcategorie){
    //     $data = array(
    //         'idcoureur' => $idcoureur,
    //         'idcategorie' =>  $idcategorie
    //     );
        
    //     $this->db->insert('coureurcategorie', $data);
    // }

    public function insererCategorie($idcoureur, $idcategorie){
        $sql = "INSERT INTO coureurcategorie (idcoureur, idcategorie)
                SELECT $idcoureur, $idcategorie
                WHERE NOT EXISTS (
                    SELECT 1
                    FROM coureurcategorie
                    WHERE idcoureur = $idcoureur AND idcategorie = $idcategorie
                )";
    
        $this->db->query($sql);
    
        // Vérification de l'insertion réussie
        return ($this->db->affected_rows() > 0);
    }
    
    

    public function InsertionCategorieTousCoureurs(){
        $TousCoureurs = $this->SelectCoureurAvecAge();
        $Categories = $this->SelectCategorie();

        foreach ($TousCoureurs as $coureur) {
            foreach ($Categories as $Categorie) {
                if($coureur->nomgenre == $Categorie->identifiant){
                    $this->insererCategorie($coureur->idcoureur,$Categorie->idcategorie);
                }else if($Categorie->identifiant == "J" ){
                    if($coureur->age < $Categorie->agefin){
                        $this->insererCategorie($coureur->idcoureur,$Categorie->idcategorie);
                    }
                }
            }
        }
    }

    

}
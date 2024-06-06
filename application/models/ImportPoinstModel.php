<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ImportPoinstModel extends CI_Model {

    function ConstruiretableauPoints($classements , $points){
        $tableauDonnes["classements"] = $classements ;
        $tableauDonnes["points"] = $points ;
        return $tableauDonnes ; 
    }

    function ControleValeurePoints($tableau) {
        $tableauErreur = array();
        $tableauDonnes = array(); 
        $i = 1;
        foreach ($tableau as $ligne) {
            $chacun = explode(";", $ligne);
            $classements = trim($chacun[0]);
            $points = trim($chacun[1]);
    
            if ($classements != null && $points != null) {
                if($points >= 0 && $classements >= 0){
                    $tableauDonnes[] = $this->ConstruiretableauPoints($classements, $points);
                } else{
                    $tableauErreur[] = "La valeure négative n'est pas accepter à la ligne : " . $i;
                }
            } else {
                $tableauErreur[] = "une valeure ne peut pas être nulle, ligne " . $i;
            }
    
            $i++;
        }
        return array($tableauErreur, $tableauDonnes); 
    }

    // fonction Insertion dans grandtablepoints
    function InsertGrandTablePoints($ligne){
        try{
            $data = array(
                'classements' => $ligne['classements'],
                'points' => (double) $ligne['points']
            );
            
            $this->db->insert('grandtablepoints', $data);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    // Insertion dans grand table apres controle
    function InsertImportPointsApresControle($tableau) {
        list($tableauErreur, $tab) = $this->ControleValeurePoints($tableau);
        try {
            if (empty($tableauErreur)) {
                foreach ($tab as $ligne) {
                    $this->InsertGrandTablePoints($ligne);
                }
            } else {
                $sommeErreur = "";
                foreach ($tableauErreur as $erreur) {
                    $sommeErreur = $sommeErreur.$erreur."\n";
                }
                throw new Exception(nl2br($sommeErreur));
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

     // Insertion dans chaque table 
     public function insertChaquePoints() {
        try {
            $this->load->database();
            $this->db->trans_start();
            $query1 = " INSERT INTO pointsetape (rang,points)
                        SELECT DISTINCT classements,points
                        FROM grandtablepoints
                        WHERE NOT EXISTS (
                            SELECT rang,points FROM pointsetape
                            WHERE pointsetape.rang = grandtablepoints.classements
                            AND pointsetape.points = grandtablepoints.points
                        )";
                        

            $this->db->query($query1);
            
            $this->db->trans_complete();
        } catch(Exception $e) {
            echo $e->getMessage();
            $this->db->trans_rollback();
        }
    }
}
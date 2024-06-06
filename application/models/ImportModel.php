<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ImportModel extends CI_Model {

    function ConstruiretableauEtape($etape , $longueur , $nbcoureur , $rangetape , $datedepart , $heuredepart){
        $tableauDonnes["etape"] = $etape ;
        $tableauDonnes["longueur"] = $longueur ;
        $tableauDonnes["nbcoureur"] = $nbcoureur ;
        $tableauDonnes["rangetape"] = $rangetape ;
        $tableauDonnes["datedepart"] = $datedepart ;
        $tableauDonnes["heuredepart"] = $heuredepart ;
        return $tableauDonnes ; 
    }

    function formaterDate($date_string){
        $date_format = 'd/m/Y';
        $date_obj = DateTime::createFromFormat($date_format, $date_string);
        
        if ($date_obj && $date_obj->format($date_format) === $date_string) {
            return true;
        } else {
            return false;
        }
    }

    function ControleValeureEtape($tableau) {
        $tableauErreur = array();
        $tableauDonnes = array(); 
        $i = 1;
        foreach ($tableau as $ligne) {
            $chacun = explode(";", $ligne);
            $etape = trim($chacun[0]);
            $longueur = trim($chacun[1]);
            $nbcoureur = trim($chacun[2]);
            $rangetape = trim($chacun[3]);
            $datedepart = trim($chacun[4]);
            $heuredepart = trim($chacun[5]);
    
            if ($etape != null && $longueur != null && $nbcoureur != null && $rangetape != null && $datedepart != null && $heuredepart != null) {
                if($this->formaterDate($datedepart) == true){
                    $tableauDonnes[] = $this->ConstruiretableauEtape($etape, $longueur, $nbcoureur, $rangetape, $datedepart ,$heuredepart);
                } else{
                    $tableauErreur[] = "Date pas valide, ligne " . $i;
                }
            } else {
                $tableauErreur[] = "une valeure ne peut pas être nulle, ligne " . $i;
            }
    
            $i++;
        }
        return array($tableauErreur, $tableauDonnes); 
    }

    // fonction Insertion dans grantableetape
    function InsertGrandTableEtape($ligne){
        try{
            $data = array(
                'etape' => $ligne['etape'],
                'longueur' => (double) str_replace(",", ".", $ligne['longueur']),
                'nbcoureur' => $ligne['nbcoureur'],
                'rangetape' => $ligne['rangetape'],
                'datedepart' => $ligne['datedepart'],
                'heuredepart' => $ligne['heuredepart']
            );
            
            $this->db->insert('grandtableetape', $data);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    // Insertion dans grand table
    function InsertImportEtapeApresControle($tableau) {
        list($tableauErreur, $tab) = $this->ControleValeureEtape($tableau);
        try {
            if (empty($tableauErreur)) {
                foreach ($tab as $ligne) {
                    $this->InsertGrandTableEtape($ligne);
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
    public function insertChaqueEtape($tab) {
        $this->InsertImportEtapeApresControle($tab);
        try {
            $this->load->database();
            $this->db->trans_start();
            $query1 = " INSERT INTO etape (idcourse,nometape,kilometre,nombrecoureur,rangetape,dateetape,heureetape)
                        SELECT DISTINCT 1,etape,longueur,nbcoureur,rangetape,datedepart,heuredepart
                        FROM grandtableetape
                        WHERE NOT EXISTS (
                            SELECT nometape FROM etape
                            WHERE etape.nometape = grandtableetape.etape
                        )";
                        

            $this->db->query($query1);
            
            $this->db->trans_complete();
        } catch(Exception $e) {
            echo $e->getMessage();
            $this->db->trans_rollback();
        }
    }

    // ------------------------------------------------- Importer Résultat --------------------------------------------------
    function ConstruiretableauResultat($etape_rang , $numerodossard ,$nom , $genre , $dtn , $equipe , $arrivee){
        $tableauDonnes["etape_rang"] = $etape_rang ;
        $tableauDonnes["numerodossard"] = $numerodossard ;
        $tableauDonnes["nom"] = $nom ;
        $tableauDonnes["genre"] = $genre ;
        $tableauDonnes["dtn"] = $dtn ;
        $tableauDonnes["equipe"] = $equipe ;
        $tableauDonnes["arrivee"] = $arrivee ;
        return $tableauDonnes ; 
    }

    function formaterDateTime($date_string){
        $date_format = 'd/m/Y H:i:s';
        $date_obj = DateTime::createFromFormat($date_format, $date_string);
        
        if ($date_obj && $date_obj->format($date_format) === $date_string) {
            return true;
        } else {
            return false;
        }
    }

    function ControleValeureResultat($tableau) {
        $tableauErreur = array();
        $tableauDonnes = array(); 
        $i = 1;
        foreach ($tableau as $ligne) {
            $chacun = explode(";", $ligne);
            $etape_rang = trim($chacun[0]);
            $numerodossard = trim($chacun[1]);
            $nom = trim($chacun[2]);
            $genre = trim($chacun[3]);
            $dtn = trim($chacun[4]);
            $equipe = trim($chacun[5]);
            $arrivee = trim($chacun[6]);
    
            if ($etape_rang != null && $numerodossard != null && $nom != null && $genre != null && $dtn != null && $equipe != null && $arrivee != null) {
                if($this->formaterDate($dtn) == true && $this->formaterDateTime($arrivee) == true){
                    $tableauDonnes[] = $this->ConstruiretableauResultat($etape_rang, $numerodossard, $nom, $genre, $dtn ,$equipe , $arrivee);
                } else{
                    $tableauErreur[] = "Date pas valide, ligne " . $i;
                }
            } else {
                $tableauErreur[] = "une valeure ne peut pas être nulle, ligne " . $i;
            }
    
            $i++;
        }
        return array($tableauErreur, $tableauDonnes); 
    }

    // fonction Insertion dans grantableresultat
    function InsertGrandTableResultat($ligne){
        try{
            $data = array(
                'etape_rang' => $ligne['etape_rang'],
                'numerodossard' => (double) $ligne['numerodossard'],
                'nom' => $ligne['nom'],
                'genre' => $ligne['genre'],
                'dtn' => $ligne['dtn'],
                'equipe' => $ligne['equipe'],
                'arrive' => $ligne['arrivee']
            );
            
            $this->db->insert('grandtableresultat', $data);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    // Insertion dans grand table resultat
    function InsertImportResultatApresControle($tableau) {
        list($tableauErreur, $tab) = $this->ControleValeureResultat($tableau);
        try {
            if (empty($tableauErreur)) {
                foreach ($tab as $ligne) {
                    $this->InsertGrandTableResultat($ligne);
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
    function InsertImportApresControleResulat($tableau) {
        list($tableauErreur, $tab) = $this->ControleValeureResultat($tableau);
        try {
            if (empty($tableauErreur)) {
                foreach ($tab as $ligne) {
                    $this->InsertGrandTableResultat($ligne);
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


    function Selectnombredoublons(){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('nombredoublons');
        $query = $this->db->get();
        return $query->result();
    }

    public function insertChaqueTableResultat($tab) {
        $this->InsertImportApresControleResulat($tab);
        try {
            $valeursdoubles = $this->Selectnombredoublons();
            $tableaudoublons = array();
            foreach ($valeursdoubles as $valeur) {
                if($valeur->nombre >= 2){
                    $tableaudoublons[] = $valeur->numerodossard ;
                }
            }
            if(count($tableaudoublons) == 0){
                $this->load->database();
                $this->db->trans_start();
                $query1 = " INSERT INTO genre (nomgenre)
                            SELECT DISTINCT genre
                            FROM grandtableresultat
                            WHERE NOT EXISTS (
                                SELECT nomgenre FROM genre
                                WHERE genre.nomgenre = grandtableresultat.genre
                            )";

                $this->db->query($query1);


                $query2 = " INSERT INTO equipe (nomequipe,mail,mdp)
                            SELECT DISTINCT  equipe, equipe||'@gmail.com' ,'000'
                            FROM grandtableresultat
                            WHERE NOT EXISTS (
                                SELECT nomequipe FROM equipe
                                WHERE equipe.nomequipe = grandtableresultat.equipe
                            )";

                $this->db->query($query2);

                $query3 = " INSERT INTO coureur (nomcoureur,idgenre,numerodossard,dtn,idequipe)
                            SELECT DISTINCT nom,genre.idgenre,numerodossard,dtn,equipe.idequipe
                            FROM grandtableresultat
                            join genre 
                            on genre.nomgenre = grandtableresultat.genre
                            join equipe
                            on equipe.nomequipe = grandtableresultat.equipe
                            WHERE NOT EXISTS (
                                SELECT nomcoureur,numerodossard FROM coureur
                                WHERE coureur.nomcoureur = grandtableresultat.nom
                                AND coureur.numerodossard = grandtableresultat.numerodossard
                            )";
                $this->db->query($query3);

                $query5 = " INSERT INTO coureuretape (idetape,idcoureur)
                            SELECT DISTINCT  etape.idetape, coureur.idcoureur
                            FROM grandtableresultat
                            join coureur
                            on coureur.nomcoureur = grandtableresultat.nom
                            join etape
                            on etape.rangetape =  grandtableresultat.etape_rang
                            WHERE NOT EXISTS (
                                SELECT idetape,idcoureur FROM coureuretape
                                WHERE coureuretape.idetape = etape.idetape
                                AND coureuretape.idcoureur = coureur.idcoureur
                            )
                            ";

                $this->db->query($query5);


                $query4 = " INSERT INTO deroulementcourse (idcoureuretape,datedepart,heuredepart,datearrive,heurearrive,duree)
                            SELECT DISTINCT coureuretape.idcoureuretape,dateetape,heureetape,DATE(arrive),
                            (EXTRACT(HOUR FROM arrive)::INTEGER || ':' || 
                            EXTRACT(MINUTE FROM arrive)::INTEGER || ':' || 
                            EXTRACT(SECOND FROM arrive)::INTEGER)::TIME AS heurearrivee,
                            EXTRACT(EPOCH FROM (arrive - (dateetape + heureetape)))
                            FROM grandtableresultat
                            join etape
                            on etape.rangetape = grandtableresultat.etape_rang
                            join coureur
                            on coureur.nomcoureur = grandtableresultat.nom
                            join coureuretape
                            on coureuretape.idetape = etape.idetape and coureuretape.idcoureur = coureur.idcoureur 
                            WHERE NOT EXISTS (
                                SELECT idcoureuretape FROM deroulementcourse
                                WHERE coureuretape.idcoureuretape = deroulementcourse.idcoureuretape
                            )
                            ";
                $this->db->query($query4);

                $this->db->trans_complete();
            }else{
                $sommeErreur = "";
                foreach ($valeursdoubles as $erreur) {
                    if($erreur->nombre > 1){
                        $texterreur = "le numero de dossard ".$erreur->numerodossard." est dupliqué" ;
                        $sommeErreur = $sommeErreur.$texterreur."\n";
                    }
                }
                throw new Exception(nl2br($sommeErreur));
            }
        } catch(Exception $e) {
            echo $e->getMessage();
            $this->db->trans_rollback();
        }
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('BaseSessionAdmin.php');

class ImportController extends BaseSessionAdmin {

	public function __construct() {
        parent::__construct();
        $this->load->model('ImportModel');
    }

    public function index(){
		$data['content'] = "import/EtapeEtResultat";
        $this->load->view("pagefrontBack" , $data);
	}

    public function imporEtapeEtResultat(){
        if(isset($_FILES['csv_file']) && isset($_FILES['csv_resultat'])) {
    //------------------------------- Maison et travaux -----------------------------
            $file_path = $_FILES['csv_file']['tmp_name'];
            $tableau = array();

            if (file_exists($file_path)) {
                $file = fopen($file_path, 'r');
    
                fgets($file);
    
                while (($line = fgetcsv($file, 1000, ',')) !== false) {
                    $tableau[] = implode(';', $line);
                }
    
                // $this->ImportModel->InsertImportEtapeApresControle($tableau);
                $this->ImportModel->insertChaqueEtape($tableau);
                fclose($file);
            } else {
                echo "Le fichier CSV u maisontravaux n'existe pas.";
            }
    //------------------------------- Maison et travaux -----------------------------
    //--------------------------------------- Devis ----------------------------------------
            $file_path_devis = $_FILES['csv_resultat']['tmp_name'];
            $tableaudevis = array();

            if (file_exists($file_path_devis)) {
                $file = fopen($file_path_devis, 'r');
    
                fgets($file);
    
                while (($line = fgetcsv($file, 1000, ','))  !== false) {
                    $tableaudevis[] = implode(';', $line);
                }
    
                // $this->ImportModel->InsertImportApresControleResulat($tableaudevis);
                $this->ImportModel->insertChaqueTableResultat($tableaudevis);
                fclose($file);
                $this->index();
            } else {
                echo "Le fichier CSV du devis n'existe pas.";
            }

    //--------------------------------------- Devis ----------------------------------------
        } else {
            // echo $_FILES['csv_file']['error'];
            echo "Aucun fichier n'a été téléchargé.";
        }
    }

}


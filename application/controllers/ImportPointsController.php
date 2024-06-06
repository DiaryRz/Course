<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('BaseSessionAdmin.php');

class ImportPointsController extends BaseSessionAdmin {

	public function __construct() {
        parent::__construct();
        $this->load->model('ImportPoinstModel');
    }

    public function index(){
		$data['content'] = "import/Points";
        $this->load->view("pagefrontBack" , $data);
	}

    public function importPoints(){
        if(isset($_FILES['csv_file']) ) {
            $file_path = $_FILES['csv_file']['tmp_name'];
            $tableau = array();

            if (file_exists($file_path)) {
                $file = fopen($file_path, 'r');
    
                fgets($file);
    
                while (($line = fgetcsv($file, 1000, ','))  !== false) {
                    $tableau[] = implode(';', $line);
                }
                fclose($file);
                $this->ImportPoinstModel->InsertImportPointsApresControle($tableau);
                $this->ImportPoinstModel->insertChaquePoints();
                $this->index();
            } else {
                echo "Le fichier CSV n'existe pas.";
            }
        } else {
            // echo $_FILES['csv_file']['error'];
            echo "Aucun fichier n'a été téléchargé.";
        }
    }

}


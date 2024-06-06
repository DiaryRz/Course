<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH . 'vendor\autoload.php'; 

include('BaseSession.php');
	
use Dompdf\Dompdf;
use Dompdf\Options;

class ClassementController extends BaseSession {

	public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
		$this->load->library('form_validation');
        $this->load->model('ListeEtapeEquipeModel');
        $this->load->model('ClassementModel');
        $this->load->model('CategorieModel');
    }

	public function ClassementEquipe(){
		$data['classements'] = $this->ClassementModel->Selectclassementequipe() ;
		$data['content'] = "classement/ClassementsEquipeFront";
		$this->load->view("pagefront" , $data);
	}

    public function ClassementEquipeBack(){
		$data['classements'] = $this->ClassementModel->Selectclassementequipe() ;
		$data['content'] = "classement/ClassemeEquipe";
		$this->load->view("pagefrontBack" , $data);
	}

	public function classementparcategorieFront(){
		$data['categories'] = $this->CategorieModel->SelectCategorie();
		$data['classements'] = $this->ClassementModel->Selectclassementparcategorie();
		$data['content'] = "classement/classementCategorie";
		$this->load->view("pagefront" , $data);
	}

	public function classementparcategorieBack(){
		$data['categories'] = $this->CategorieModel->SelectCategorie();
		$data['classements'] = $this->ClassementModel->Selectclassementparcategorie();
		$data['content'] = "classement/classementCategorie";
		$this->load->view("pagefrontBack" , $data);
	}

	// ------------------------------------PDF-------------------------------------------------	
	public function ExporterPDF(){
        $gagnant= $this->ClassementModel->Certificat() ;

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        $data['informations'] = $gagnant;
        // Charger la vue avec les données spécifiques
        if($gagnant != null){
            $html = $this->load->view('PDF/Certificat', $data, TRUE);
        
            // var_dump($html);

            // Charger le HTML dans Dompdf
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4','landscape');

            // Rendre le PDF
            $dompdf->render();

            $dtn = $this->ClassementModel->datepournom();
            // Enregistrer le PDF dans un fichier
            $pdf_content = $dompdf->output();
            $file_path = "uploads\pdf\pdf_" . $dtn . ".pdf";
            if (file_put_contents($file_path, $pdf_content) !== false) {
                redirect("ClassementController/ClassementEquipeBack");
                echo "PDF généré avec succès : $file_path <br>";
            } else {
                echo "Erreur lors de la génération du PDF : $file_path <br>";
            }
        }else{
            echo "Il n'y a pas encore de vainceur";
        }
        
    }

    // public function afficherdetails(){
    //     $data['listecoureurs'] = $this->ClassementModel->detailsgeneral($_GET['idequipe']);
    //     $this->load->view("classement/DetailsClassement" , $data);
    // }

    public function afficherdetails(){
        $data['listecoureurs'] = $this->ClassementModel->detailsgeneral($_GET['idequipe']);
        $data['content'] = "classement/DetailsClassement";
        $this->load->view("pagefrontBack" , $data);
    }

	

}


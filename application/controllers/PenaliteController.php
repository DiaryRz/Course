<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('BaseSessionAdmin.php');

class PenaliteController extends BaseSessionAdmin {

	public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
		$this->load->library('form_validation');
        $this->load->model('LoginModel');
        $this->load->model('ListeEtapeEquipeModel');
        $this->load->model('PenaliteModel');
    }

    public function index(){
        $data['equipes'] = $this->LoginModel->SelectEquipe();
        $data['etapes'] = $this->ListeEtapeEquipeModel->SelectEtapeSansPagination();
		$data['content'] = "backoffice/penaliteFormulaire";
		$this->load->view("pagefrontBack" , $data);
	}

    public function Valider(){
        $this->PenaliteModel->InsertionPenalite($_POST['idetape'] , $_POST['idequipe'] , $_POST['temps']);
        redirect("PenaliteController/index");
    }

    public function ListePenalite(){
        $data['penalites'] = $this->PenaliteModel->SelectPenalite();
        $data['content'] = "backoffice/ListePenalite";
        $this->load->view("pagefrontBack" , $data);
    }

    public function delete(){
        $this->PenaliteModel->SupprimerPenalite($_GET['idpenalite']);
        redirect("PenaliteController/ListePenalite");
    }
}


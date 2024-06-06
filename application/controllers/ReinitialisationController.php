<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('BaseSessionAdmin.php');

class ReinitialisationController extends BaseSessionAdmin {

	public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
		$this->load->library('form_validation');
        $this->load->model('ReinitialiserModel');
        $this->load->model('ClassementModel');
    }

	public function FormulaireInitialiserBase() {
		$data['content'] = "initialiserBase/Initialisation";
		$this->load->view("pagefrontBack" , $data);
	}
	
	public function reinitieliser(){
		$this->ReinitialiserModel->InitialiserDonnees();
		redirect("ReinitialisationController/FormulaireInitialiserBase");
	}

}


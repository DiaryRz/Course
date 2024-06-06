<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('BaseSessionAdmin.php');

class CategorieController extends BaseSessionAdmin {

	public function __construct() {
        parent::__construct();
        $this->load->model('CategorieModel');
    }

    public function index(){
		$data['content'] = "backoffice/Formulairecategorie";
        $this->load->view("pagefrontBack" , $data);
	}

    public function attribuerCategorie(){
        $this->CategorieModel->InsertionCategorieTousCoureurs();
        redirect("CategorieController/index");
    }

}


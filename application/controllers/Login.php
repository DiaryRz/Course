<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	
	public function index(){
		$this->load->view('Login/loginFront');
	}
	
	public function ValiderLogin(){
		$this->load->model('LoginModel');
		$listeUtilisateur = $this->LoginModel->SelectEquipe();
		$mail = $_POST['email'];
		$mdp = $_POST['mdp'];
		$variable = false;
		$identifiant = 0;
		foreach ($listeUtilisateur as $user) {
			if($user->nomequipe == $mail && $user->nomequipe == $mdp){

				$variable = true; 
				$this->session->set_userdata("idUtilisateur" , $user->idequipe);
				$this->session->set_userdata("identifiant" , $user->identifiant);
				break;
			}
		}
		if($variable == true){
			redirect('ListeEtapeEquipeController');
		}
		else{
			$tab['mailfaux'] = $_POST['email'];
			$this->load->view('Login/loginFront' , $tab);
		}
	}


	// Login backoffice
	public function pageLoginBack(){
		$this->load->view('Login/loginBack');
	}

	public function ValiderLoginBack(){
		$this->load->model('LoginModel');
		$listeUtilisateur = $this->LoginModel->SelectAdmin();
		$mail = $_POST['email'];
		$mdp = $_POST['mdp'];
		$variable = false;
		$identifiant = 0;
		foreach ($listeUtilisateur as $user) {
			if($user->mail == $mail && $user->mdp == $mdp){

				$variable = true; 
				$this->session->set_userdata("idUtilisateur" , $user->idadmin);
				$this->session->set_userdata("identifiant" , $user->identifiant);
				break;
			}
		}
		if($variable == true){
			redirect('ListeEtapeAdminController');
		}
		else{
			$tab['mailfaux'] = $_POST['email'];
			$this->load->view('Login/loginBack' , $tab);
		}
	}
	
	// Deconnexion
	public function deconnexionFront(){
		$this->session->unset_userdata("idUtilisateur");
		$this->session->unset_userdata("identifiant");
		redirect("Login");
	}

	public function deconnexionBack(){
		$this->session->unset_userdata("idUtilisateur");
		$this->session->unset_userdata("identifiant");
		redirect("Login/pageLoginBack");
	}

}


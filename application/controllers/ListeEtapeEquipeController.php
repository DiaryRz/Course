<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('BaseSessionClient.php');

class ListeEtapeEquipeController extends BaseSessionClient {

	public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
		$this->load->library('form_validation');
        $this->load->model('ListeEtapeEquipeModel');
        $this->load->model('ClassementModel');
    }

	public function index(){    
        $data['etapes'] = $this->ListeEtapeEquipeModel->SelectEtapeSansPagination();
        $data['etapesavectempscoureurs'] = $this->ListeEtapeEquipeModel->SelectEtapeAvecTempsCoureur();
		$data['content'] = "frontoffice/accueilFrontOffice";
		$this->load->view("pagefront" , $data);
	}

    public function indexAvant(){
		$config['base_url'] = base_url('ListeEtapeEquipeController/index');
        $config['total_rows'] = $this->ListeEtapeEquipeModel->NombreEtape(); 
        $config['per_page'] = 5; 
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
    
        $this->pagination->initialize($config);
    
        $data['etapes'] = $this->ListeEtapeEquipeModel->SelectEtape($config['per_page'], $this->uri->segment(5));
		$data['content'] = "frontoffice/accueilFrontOffice";
		$this->load->view("pagefront" , $data);
	}

	public function affecterformulaire($nombre = null, $idetape = null) {
		$data['nombre'] = $nombre !== null ? $nombre : $this->input->get('nombre');
		$data['idetape'] = $idetape !== null ? $idetape : $this->input->get('idetape');
		$nb = 0;
		// isan'ny coureur ilaina
		$nombrecoureuractu = $this->ListeEtapeEquipeModel->Selectnombrecoureuretapequipe($data['idetape'],$this->session->userdata('idUtilisateur'));
		if($nombrecoureuractu != null){
			$nb = $nombrecoureuractu->nombrecoureur;
		}
		// nombre n'ny coureur ao anaty etape @ equipe 1
		$data['nombredanslacourse'] = $nb;

		// mitady reste
		// $nombreaoparetapeirery = $this->ListeEtapeEquipeModel->SelectEtapeParIdEtape($data['idetape'])->nombrecoureur;
		// $data['reste'] = $nombreaoparetapeirery - $nombrecoureuractu  ;

		$data['coureur'] = $this->ListeEtapeEquipeModel->SelectCoureurDuMemeEquipe($this->session->userdata('idUtilisateur'));
		$data['content'] = "frontoffice/AffectationFormulaire";
		$this->load->view("pagefront", $data);
	}
	

	public function affecter() {
		$this->form_validation->set_rules('coureur[]', 'Coureur', 'required|trim');
		$nombre = $this->input->post('nombre');
		$idetape = $this->input->post('idetape');
		try {
	
			if ($this->form_validation->run() == FALSE) {
				$this->affecterformulaire($nombre, $idetape);
			} else {
				$coureurs = $this->input->post('coureur[]');
				$nombrecoureurdanslacourse = $_POST['nombredanslacourse'] + count($coureurs);
	
				if ($nombrecoureurdanslacourse <= $nombre) {
					foreach ($coureurs as $coureur) {
						$check = $this->ListeEtapeEquipeModel->VerificationSiCoureurEstDejaDansLEtape($idetape,$coureur);
						echo count($check);
						if(count($check) != 0){
							throw new Exception("Un ou plusieurs coureurs séléctionnés sont déjà affecté à cette étape" );
						}
					}
					$this->ListeEtapeEquipeModel->insertcoureurauneetape($idetape, $coureurs);
					redirect("ListeEtapeEquipeController/index");
				} else {
					throw new Exception("Le nombre de coureur doit être <= ".$nombre . ",le nombre actuel de coureur dans cette course avec votre equipe en incluant ceux que vous avez séléctionné est de : ".$nombrecoureurdanslacourse);
				}
			}
		} catch (Exception $th) {
			$this->session->set_flashdata('exception', $th->getMessage());
			$this->session->set_flashdata('selected_coureurs', $this->input->post('coureur[]'));
	
			$this->affecterformulaire($nombre, $idetape);
		}
	}

	public function classementparetape() {
		$data['classements'] = $this->ClassementModel->Selectclassementgeneralparetape($_GET['idetape']);
		$data['Etape'] = $this->ClassementModel->SelectEtape($_GET['idetape']);
		$data['content'] = "classement/ClassementParEtape";
		$this->load->view("pagefront" , $data);
	}
	

}


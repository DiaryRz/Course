<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('BaseSessionAdmin.php');

class ListeEtapeAdminController extends BaseSessionAdmin {

	public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
		$this->load->library('form_validation');
        $this->load->model('ListeEtapeEquipeModel');
        $this->load->model('ClassementModel');
    }

    public function index(){
		$config['base_url'] = base_url('ListeEtapeAdminController/index');
        $config['total_rows'] = $this->ListeEtapeEquipeModel->NombreEtape(); 
        $config['per_page'] = 5; 
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
    
        $this->pagination->initialize($config);
    
        $data['etapes'] = $this->ListeEtapeEquipeModel->SelectEtape($config['per_page'], $this->uri->segment(5));
		$data['content'] = "backoffice/accueilBackOffice";
		$this->load->view("pagefrontBack" , $data);
	}

    public function formulairetemps($idetape = null,$coureurs= null,$datedepart= null,$heureetape= null){
        $idetape = $idetape !== null ? $idetape : $this->input->get('idetape');
        $coureurs = $coureurs !== null ? $coureurs : $this->input->post('coureurs');
        $datedepart = $datedepart !== null ? $datedepart : $this->input->post('datedepart');
        $heureetape = $heureetape !== null ? $heureetape : $this->input->post('heureetape');
        $heureetape = $heureetape !== null ? $heureetape : $this->input->post('heureetape');
        $data['coureurs'] = $this->ListeEtapeEquipeModel->SelectCoureurParEtape($idetape);
        $data['datedepart'] = $this->ListeEtapeEquipeModel->SelectEtapeParIdEtape($idetape)->dateetape;
        $data['heureetape'] = $this->ListeEtapeEquipeModel->SelectEtapeParIdEtape($idetape)->heureetape;
        $data['idetape'] = $idetape;
        $data['content'] = "backoffice/ChoisirCoureur";
		$this->load->view("pagefrontBack" , $data);
    }

    public function formulaireinsertiontemps($idetape = null){
        $this->form_validation->set_rules('idcoureur', 'Coureur', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->formulairetemps($idetape,$this->ListeEtapeEquipeModel->SelectCoureurParEtape($idetape),$_POST['datedepart'],$_POST['heureetape']);
        } else {
            $idetape = $idetape !== null ? $idetape : $_POST['idetape'];
            $data['coureurs'] = $this->ListeEtapeEquipeModel->SelectCoureurParIdCoureur($_POST['idcoureur']);
            $data['datedepart'] = $_POST['datedepart'];
            $data['idetape'] = $_POST['idetape'];
            $data['heureetape'] = $_POST['heureetape'];
            $data['content'] = "backoffice/AffecterTempsFormulaire";
            $this->load->view("pagefrontBack" , $data);
        }
    }

    public function validerFormulaire(){
        $this->form_validation->set_rules('temps', 'Temps', 'required|trim');
        $this->form_validation->set_rules('date', 'Date', 'required|trim');
        $idetape = $this->input->post('idetape');
    
        try {
            if ($this->form_validation->run() == FALSE) {
                $this->formulaireinsertiontemps($idetape);
            } else {
                
                    $data = array();
                    $temps = $_POST['temps'];
                    $coureur = $_POST['idcoureur'];
                    $date = $_POST['date'];
                        $datetime_arrive = new DateTime($date . ' ' . $temps);
                        $Verif = $this->ListeEtapeEquipeModel->VerificationTempsCoureur($_POST['idetape'],$coureur);
                        if($datetime_arrive >= new DateTime($_POST['datedepart'] )){
                            if(count($Verif) < 1){
                                // Crée une entrée de données pour chaque coureur
                                $coureur_data = array(
                                    'idetape' => $_POST['idetape'] , 
                                    'idcoureur' => $coureur , 
                                    'heureetape' => $_POST['heureetape'] , 
                                    'datedepart' => $_POST['datedepart'],
                                    'datearrive' => $date,
                                    'heurearrive' => $temps
                                );
            
                                $data[] = $coureur_data;
                            }else{
                                throw new Exception("Ce coureur a déjà un temps défini à cette étape.");
                            }
                        } else {
                            throw new Exception("Le temps d'arrivé doit être supérieure au temps de depart.");
                        }
                    $this->ListeEtapeEquipeModel->insererDeroulementCourse($data);
                    redirect("ListeEtapeAdminController/index");
            }
        } catch (Exception $th) {
            $this->session->set_flashdata('exception', $th->getMessage());
            $this->session->set_flashdata('idetape', $idetape);
            $this->session->set_flashdata('datedepart', $_POST['datedepart']);
            $this->session->set_flashdata('date', $this->input->post('date'));
            $this->session->set_flashdata('temps', $this->input->post('temps'));
            $this->session->set_flashdata('coureurs', $this->ListeEtapeEquipeModel->SelectCoureurParEtape($idetape));
            $this->formulaireinsertiontemps($idetape);
        }
    }
    
    public function classementparetape() {
		$data['classements'] = $this->ClassementModel->Selectclassementgeneralparetape($_GET['idetape']);
        $data['Etape'] = $this->ClassementModel->SelectEtape($_GET['idetape']);
		$data['content'] = "classement/ClassementParEtape";
		$this->load->view("pagefrontBack" , $data);
	}

}


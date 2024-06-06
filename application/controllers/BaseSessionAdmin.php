<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('BaseSession.php');

class BaseSessionAdmin extends BaseSession {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('identifiant') != 1) {
            redirect('Login/pageLoginBack');
        }
        
    }
}

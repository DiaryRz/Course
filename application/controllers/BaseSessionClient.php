<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('BaseSession.php');

class BaseSessionClient extends BaseSession {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('identifiant') != 0) {
            redirect('Login');
        }
        
    }
}

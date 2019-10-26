<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sobre_controller extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('sobre_model', 'sm');
    }

	public function index(){

        $this->load->view('sobre', $this->sm->retornoSobre());
        
	}
}

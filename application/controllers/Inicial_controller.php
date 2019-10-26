<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicial_controller extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('inicial_model','im');
    }

    public function index(){

        $dados['listas'] = $this->im->retornoEvent();
        

        $this->load->view('inicial', $dados);
    }
}

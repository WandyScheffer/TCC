<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PageLocador_controller extends CI_Controller
{
    // d1
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuarios_model', 'um');
        
    }

    public function index()
    {
        $id_user = $_SESSION['id_user'];

        $dados['user'] = ($this->um->retornaUserUni($id_user))[0];

        // print_r($dados['user']);
        $this->load->view('page_locador', $dados);
    }
}

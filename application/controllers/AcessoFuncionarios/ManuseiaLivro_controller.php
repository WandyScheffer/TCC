<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManuseiaLivro_controller extends CI_Controller
{
// d3
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {   
        $this->load->model('catalogo_model', 'cm');// carregando model para retornar autores

        $dados['lista_autores'] = $this->cm->retornoAutores();
        $dados['lista_generos'] = $this->cm->retornoGeneros();

        // print_r($dados);
        $this->load->view('cadastro_livro', $dados);
    }
    public function edit()
    {
        $this->load->view('editar_livro');
    }
    public function cadastrandoLivro()
    {
        $array_livro = array(
            'nm_titulo' => $_POST['nm_titulo'], 
            'cod_isbn' => $_POST['isbn']
        );
        
        
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManuseiaLivro_controller extends CI_Controller
{
// d3
    function __construct()
    {
        parent::__construct();
        $this->load->model('InsereEditLivro_model', 'ielm');
        
        
        
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

        $this->load->model('catalogo_model', 'cm'); // carregando model para retornar autores

        $dados['lista_autores'] = $this->cm->retornoAutores();
        $dados['lista_generos'] = $this->cm->retornoGeneros();

        $id_livro = $this->uri->segment(2);
        
        $dados['livro'] = ($this->ielm->retornoEdit($id_livro)[0]);
        
        // print_r($dados['livro']);
        $this->load->view('editar_livro', $dados);
    }

    public function editando()
    {
        

        $id_livro = $this->uri->segment(2);

        

        $array_livro = array(
            'nm_titulo' => strtoupper($_POST['nm_titulo']),
            'cod_isbn' => $_POST['isbn']
        );

        $this->ielm->editLivro($array_livro, $id_livro);

        


        $array_autores = array(
            'id_autor_1' => $_POST['select_autores1'],

        );
        if ($_POST['select_autores2'] != '') {
            $array_autores['id_autor_2'] = $_POST['select_autores2'];
        }
        if ($_POST['select_autores3'] != '') {
            $array_autores['id_autor_3'] = $_POST['select_autores3'];
        }

        $this->ielm->editLivroAutor($array_autores, $id_livro);
        

        $array_generos = array(
            'id_genero_1' => $_POST['select_generos1'],

        );
        if ($_POST['select_generos2'] != '') {
            $array_generos['id_genero_2'] = $_POST['select_generos2'];
        }
        if ($_POST['select_generos3'] != '') {
            $array_generos['id_genero_3'] = $_POST['select_generos3'];
        }

        $this->ielm->editLivroGenero($array_generos, $id_livro);


        $qt_add_exemplar = $_POST['qt_exemplar'];

        $this->ielm->addExemplares($qt_add_exemplar, $id_livro);

        // print_r($qt_add_exemplar);

        redirect(base_url('catalogo'));
        
    }

    public function cadastrandoLivro()
    {

        $array_livro = array(
            'nm_titulo' => strtoupper ($_POST['nm_titulo']), 
            'cod_isbn' => $_POST['isbn']
        );

        $insere_livro = $this->ielm->insereLivro($array_livro);

        $id_livro_inserido = ($this->ielm->ultimoInserido())[0]['id_livro'];

        $array_autores = array(
            'id_autor_1' => $_POST['select_autores1'],
            
        );
        if ($_POST['select_autores2']!='') {
            $array_autores['id_autor_2'] = $_POST['select_autores2'];
        }
        if ($_POST['select_autores3'] != '') {
            $array_autores['id_autor_3'] = $_POST['select_autores3'];
        }

        $this->ielm->relacaoAutor($array_autores, $id_livro_inserido);//inseriondo relacionamento entre autores e livro

        $array_generos = array(
            'id_genero_1' => $_POST['select_generos1'],
            
        );
        if ($_POST['select_generos2'] != '') {
            $array_generos['id_genero_2'] = $_POST['select_generos2'];
        }
        if ($_POST['select_generos3'] != '') {
            $array_generos['id_genero_3'] = $_POST['select_generos3'];
        }

        $this->ielm->relacaoGenero($array_generos, $id_livro_inserido);//inseriondo relacionamento entre generos e livro

        $qt_exemplares = $_POST['qt_exemplar'];

        $this->ielm->relacaoExemplares($qt_exemplares, $id_livro_inserido);
        
        
        redirect(base_url('cad_livro'));
        
    }

    public function cadAutorGenero()
    {

        $dados['tipo'] = $this->uri->segment(2);
        $this->load->view('autor_genero', $dados);
        
    }

    public function cadastrandoReferente()
    {

        $tipo = $this->uri->segment(2);
        
        if ($tipo==1) {
            
            $nm_autor = array('nm_autor' => strtoupper ($_POST['dado_referente']));
            $this->ielm->addAutor($nm_autor);
            redirect(base_url('cad_referente_livro/1'));
        } else {
            
            $tipo_genero = array('tipo' => strtoupper ($_POST['dado_referente']));
            $this->ielm->addGenero($tipo_genero);
            redirect(base_url('cad_referente_livro/2'));
        }

        
        
        
    }

}

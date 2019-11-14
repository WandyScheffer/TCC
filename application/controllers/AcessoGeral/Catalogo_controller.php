<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogo_controller extends CI_Controller {
// d3
    function __construct(){
        parent::__construct();
        $this->load->model('catalogo_model', 'cm');
        
    }

	public function index(){// toda a pesquisa retorna aqui tbm
        $dados['lista_autores']=$this->cm->retornoAutores();
        $dados['lista_generos'] = $this->cm->retornoGeneros();
        

        $config = array(
            "base_url" => base_url('catalogo/p'),
            "per_page" => 8, //limit
            "num_links" => 3,
            "uri_segment" => 3, //offset
            "total_rows" => $this->cm->nuLinhas(1),
            "full_tag_open" => "<ul class = 'pagination'>",
            "full_tag_close" => "</ul>",
            "first_link" => false,
            "last_link" => false,
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "prev_link" => "Anterior",
            "prev_tag_open" => "<li class = 'prev page-link'>",
            "prev_tag_close" => "<li>",
            "next_link" => "Próximo",
            "next_tag_open" => "<li class = 'next page-link'>",
            "next_tag_close" => "<li>",
            "last_tag_open" => "<li>",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class = 'active page-item'><span class = 'page-link'>",
            "cur_tag_close" => "<span class='sr-only'>(current)</span></span></li>",
            "num_tag_open" => "<li class = 'page-link'>",
            "num_tag_close" => "</li>"
            
        );
        

        $this->pagination->initialize($config);
        $dados['paginacao'] = $this->pagination->create_links();
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $dados['tabelaLivros'] = $this->cm->retornoLivroAlfa($config['per_page'], $offset);
        
        
        
        $this->load->view('catalogo', $dados);

    }


    //consertar pesquisa vazia 
    //consertar erro ao tentar voltar para pagina onde recebeu dados do formulário
    public function pesquisaLike()
    {
        $dados['lista_autores'] = $this->cm->retornoAutores();
        $dados['lista_generos'] = $this->cm->retornoGeneros();
        
        if (isset($_POST['caixaPesquisa']) && $_POST['caixaPesquisa']!='') {
            
            setcookie('caixaPesquisa', strtoupper($_POST['caixaPesquisa']));
            setcookie('tipo', $_POST['op']);

            $nu_linhas = sizeof($this->cm->retornoLike($_POST['op'], strtoupper($_POST['caixaPesquisa']), null, 0));

            $config = array(
                "base_url" => base_url('pesquisa/p'),
                "per_page" => 3, //limit
                "num_links" => 3,
                "uri_segment" => 3, //offset
                "total_rows" => $nu_linhas
            );

            $this->pagination->initialize($config);

            $dados['paginacao'] = $this->pagination->create_links();
            $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $dados['tabelaLivros'] = $this->cm->retornoLike($_POST['op'], strtoupper($_POST['caixaPesquisa']), $config['per_page'], $offset);
            $dados['caixaPesquisa'] = strtoupper($_POST['caixaPesquisa']);
            $dados['op'] = $_POST['op'];

            
            
        }else{
            if ($_POST['bt_pesquisa'] && $_POST['caixaPesquisa'] == '') {
                
            }
            $nu_linhas = sizeof($this->cm->retornoLike(get_cookie('tipo'), get_cookie('caixaPesquisa'), null, 0));
            
            $config = array(
                "base_url" => base_url('pesquisa/p'),
                "per_page" => 3, //limit
                "num_links" => 3,
                "uri_segment" => 3, //offset
                "total_rows" => $nu_linhas
            );
    
            $this->pagination->initialize($config);
    
            $dados['paginacao'] = $this->pagination->create_links();
            $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $dados['tabelaLivros'] = $this->cm->retornoLike(get_cookie('tipo'), get_cookie('caixaPesquisa'), $config['per_page'], $offset);
            $dados['caixaPesquisa'] = get_cookie('caixaPesquisa');
            $dados['op'] = get_cookie('tipo');

            if ($_POST['bt_pesquisa'] && $_POST['caixaPesquisa'] == '') {
                $dados['tabelaLivros'] = null;
                $dados['caixaPesquisa'] = null;
                $dados['op'] = null;
                $dados['paginacao'] = null;
            }

            
        }

        $this->load->view('catalogo', $dados);
        
        
    }

    public function filtro()//consertar pesquisa vazia //ficar de olho se n está dando bug
    {

        $dados['lista_autores'] = $this->cm->retornoAutores();
        $dados['lista_generos'] = $this->cm->retornoGeneros();

        /*
        selecao_autores
        selecao_generos
        */

        //------------------------------------------------------------- 
        if ($_POST['bt_filtro'] && $_POST['selecao_autores'] == '' && $_POST['selecao_generos'] == '') {
            $dados['tabelaLivros'] = null;
            $dados['autor'] = null;
            $dados['genero'] = null;
            $dados['paginacao'] = null;
            
        }else {//tem q fazer coisa aqui-----------------------------
            if (isset($_POST['bt_filtro'])) {
                $estado = 1;
                setcookie('autor', null, -1);
                setcookie('genero', null, -1);
            }else {
                $estado = 0;//só permite usar os cookies quando não foi enviado o formulário ainda...
            }
    
            $lista_filtros = [];
            if (isset($_POST['selecao_autores']) && $_POST['selecao_autores']!='') {
                $lista_filtros['autor'] = $_POST['selecao_autores'];
                setcookie('autor', $_POST['selecao_autores']);
                $dados['autor'] = $_POST['selecao_autores'];
            }
            else if (get_cookie('autor') && $estado == 0) {
                $lista_filtros['autor'] = get_cookie('autor');
                $dados['autor'] = get_cookie('autor');
            }
            if (isset($_POST['selecao_generos']) && $_POST['selecao_generos'] != '') {
                $lista_filtros['genero'] = $_POST['selecao_generos'];
                setcookie('genero', $_POST['selecao_generos']);
                $dados['genero'] = $_POST['selecao_generos'];
            }
            else if (get_cookie('genero') && $estado == 0) {
                $lista_filtros['genero'] = get_cookie('genero');
                $dados['genero'] = get_cookie('genero');
            }
    
            $nu_linhas = sizeof($this->cm->filtro($lista_filtros, null, 0));
    
            $config = array(
                "base_url" => base_url('filtro/p'),
                "per_page" => 3, //limit
                "num_links" => 3,
                "uri_segment" => 3, //offset
                "total_rows" => $nu_linhas
            );
    
            $this->pagination->initialize($config);
    
            $dados['paginacao'] = $this->pagination->create_links();
            $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $dados['tabelaLivros'] = $this->cm->filtro($lista_filtros, $config['per_page'], $offset);
    
            
        }
        $this->load->view('catalogo', $dados);
        //------------------------------------------------------------

    }
}
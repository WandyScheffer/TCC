<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PageLocador_controller extends CI_Controller
{
    // d1
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuarios_model', 'um');
        $this->load->model('Locacoes_model', 'lm');
        
        
    }

    public function index()
    {
        $id_user = $_SESSION['id_user'];

        $dados['user'] = ($this->um->retornaUserUni($id_user))[0];


        $nu_linhas = sizeof($this->lm->locacoesUsuario($id_user, null, 0));

        $config = array(
            "base_url" => base_url('perfil/p'),
            "per_page" => 3, //limit
            "num_links" => 3,
            "uri_segment" => 3, //offset
            "total_rows" => $nu_linhas
        );

        $this->pagination->initialize($config);

        $dados['paginacao'] = $this->pagination->create_links();
        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $dados['tabelaLocacoesUser'] = $this->lm->locacoesUsuario($id_user, $config['per_page'], $offset);

        

        $this->load->view('page_locador', $dados);
    }

    public function renovando()
    {
        $id_locacao = $this->uri->segment(2);

        $this->lm->renovamentoIdLocacao($id_locacao);

        
        redirect(base_url('perfil'));
        
        
    }
}

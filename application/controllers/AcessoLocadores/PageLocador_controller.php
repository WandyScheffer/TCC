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
            "per_page" => 5, //limit
            "num_links" => 3,
            "uri_segment" => 3, //offset
            "total_rows" => $nu_linhas,
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

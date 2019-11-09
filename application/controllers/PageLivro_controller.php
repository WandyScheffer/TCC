<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PageLivro_controller extends CI_Controller
{
    // d1
    function __construct()
    {
        parent::__construct();
        $this->load->model('SobreLivro_model', 'slm');
        
    }

    public function index()
    {   
        $id = $this->uri->segment(2);
        
        $dados['infoLivro'] = ($this->slm->retornaInfoLivro($id))[0];

        //arrumar daqui.........................................................................................

        $nu_linhas = sizeof($this->slm->retornaComentLivro(null, null, $id));

        $config = array(
            "base_url" => base_url("pagina_livro/$id/p"),
            "per_page" => 1, //limit
            "num_links" => 3,
            "uri_segment" => 4, //offset
            "total_rows" => $nu_linhas
        );

        $this->pagination->initialize($config);
        $dados['paginacao'] = $this->pagination->create_links();
        $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $dados['tabelaComent'] = $this->slm->retornaComentLivro($config['per_page'], $offset, $id);

        //até aqui.........................................................................................

        // print_r(sizeof($this->slm->retornaComentLivro(null, null, $id)));

        $this->load->view('page_livro', $dados);
    }
}

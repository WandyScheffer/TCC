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
        
        
        $this->load->view('page_livro', $dados);
    }
}

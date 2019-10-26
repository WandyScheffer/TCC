<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CadConteudo_controller extends CI_Controller
{
    // d1
    function __construct()
    {
        parent::__construct();
        $this->load->model('CadConteudo_model', 'ccm');
    }

    public function index()
    {
        $dados['valor']=$this->ccm->valorMulta();
        $dados['antigoTitulo'] = $this->ccm->ultimoSobre()['titulo'];
        $dados['antigoSobre'] = $this->ccm->ultimoSobre()['conteudo'];


        $this->load->view('cadastro_conteudos',$dados);

    }

    public function atualizaMulta()
    {
        $this->form_validation->set_rules('valor', 'Valor multa', 'trim|required');
        
        
        if ($this->form_validation->run() == TRUE or FALSE) {
            $valor = $_POST['valor'];
            $id = $this->session->userdata['id_user'];

            $verif = $this->ccm->novaMulta($valor, $id);
            redirect(base_url('cad_conteudos'));
        } else {
            //mostrar erro futuramente;
        }
        

        
        
    }
    public function atualizaSobre()
    {
        //$this->form_validation->set_rules('nv_titulo', 'Novo titulo', 'trim|required|');
        
        $dados['titulo'] = $_POST['nv_titulo'];
        $dados['conteudo'] = $_POST['nv_sobre'];
        $dados['dt_publicacao'] = 'now()';
        $dados['id_biblio'] = $this->session->userdata('id_user');
        $dados['tipo'] = 1;
        
        $this->ccm->novoSobre($dados);

        redirect(base_url('cad_conteudos'));


    }
    public function cadastraNoticia()
    {
        //$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required');

        $dados['dt_publicacao'] = 'now()';
        $dados['dt_prevista'] = $_POST['dt_prevista'];
        $dados['titulo'] = $_POST['titulo'];
        $dados['conteudo'] = $_POST['noticia'];
        $dados['id_biblio'] = $this->session->userdata('id_user');
        $dados['tipo'] = 2;

        $this->ccm->cadNoticia($dados);
        
        redirect(base_url('cad_conteudos'));
        
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Locacao_controller extends CI_Controller
{
    // d1 //precisa da listagem tbm d2
    function __construct()
    {
        parent::__construct();
        $this->load->model('Locacoes_model','lm');
        
    }

    public function index()
    {
        $this->load->view('locacoes');
    }
    
    public function lista()
    {
        $nu_linhas = sizeof($this->lm->listaLocacoes(null, null));

        $config = array(
            "base_url" => base_url('locacoes/lista/p'),
            "per_page" => 3, //limit
            "num_links" => 3,
            "uri_segment" => 4, //offset
            "total_rows" => $nu_linhas
        );

        $this->pagination->initialize($config);
        
        $dados['paginacao'] = $this->pagination->create_links();
        $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $dados['tabelaLocacao'] = $this->lm->listaLocacoes($config['per_page'], $offset);
        // print_r($dados['tabelaLocacao']);
        // print_r($dados['paginacao']);
        $this->load->view('locacoes_listagem', $dados);
        
    }

    public function locando()
    {   
        //dt_devo_prevista --- colocar no model apenas
        //id_locador -- recebo da view
        //id_biblio -- pego da session
        //id_exemplar -- pego da view

        

        $array_info_locacao_view = array(
            'id_locador' => $_POST['id_locador'],
            'id_bibliotecario' => $_SESSION['id_user'],
            'id_exemplar' => $_POST['id_exemplar']
        );

        $verificacaoExemplares = $this->lm->verificaExemplar($array_info_locacao_view['id_exemplar']);
        $verificacaoUsers = $this->lm->verificaUser($array_info_locacao_view['id_locador']);

        if (sizeof($verificacaoExemplares)==1) {
            $dados['msg'] = 'Exemplar não encontrado, podendo não existir ou se encontrar locados!';
            $this->load->view('locacoes', $dados);
            
        }else{
            if (sizeof($verificacaoUsers)==1) {
                $this->lm->realizaLocacao($array_info_locacao_view);
                $dados['msg'] = 'Locado com sucesso!';
                $this->load->view('locacoes', $dados);
                // redirect(base_url('locacoes'));
            }else {
                $dados['msg'] = 'Usuário inválido!';
                $this->load->view('locacoes', $dados);
            }
        }

        

        
        
        
        // date_default_timezone_set('America/Sao_Paulo');

        // $atual = new DateTime();
        
        // print_r($atual->format('d-m-Y'));
    }

    public function manuseialocacao()
    {
        
        $id_locador = $_POST['id_locador_devolucao'];
        $verificacaoUsers = $this->lm->verificaUser($id_locador);

        if (sizeof($verificacaoUsers) == 1) {
            if (isset($_POST['bt_pesquisar'])) {
                $dados['retorno'] = $this->lm->pesquisaEncerra($id_locador)[0];
                $dados['id_usuario'] = $id_locador;
                $this->load->view('locacoes', $dados);
            
            }elseif (isset($_POST['bt_encerrar'])) {
                //dt devolucao
                //vl_pago
                //id_biblio_encerrou
                $dados['retorno'] = $this->lm->pesquisaEncerra($id_locador)[0];
                $multa = ($dados['retorno']['multa']>0) ? $dados['retorno']['multa'] : 0 ;
                $id_biblio_encerrou = $_SESSION['id_user'];
                
                $array_update = array(
                    'vl_pago' => $multa,
                    'id_biblio_encerrou' => $id_biblio_encerrou,
                    'id_locador' => $id_locador
                );
                $id_exemplar = $this->lm->identificaExemplarEncerra($id_locador);
                $this->lm->livroDeVoltaEncerra($id_exemplar[0]['id_exemplar']);
                $this->lm->encerrar($array_update);
                $dados['msg'] = 'Encerrado!';
                $this->load->view('locacoes', $dados);

                // print_r($id_exemplar[0]['id_exemplar']);

            }elseif (isset($_POST['bt_renovar'])) {
                $dados['msg'] = 'Renovado!';
                $this->lm->renovamento($id_locador);
                $this->load->view('locacoes', $dados);
            }


            
        } else {
            $dados['msg'] = 'Usuário inválido!';
            $this->load->view('locacoes', $dados);
        }

        
    }
}

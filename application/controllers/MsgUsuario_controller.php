<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MsgUsuario_controller extends CI_Controller
{
    // d2
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mensagens_model', 'mm');
        
    }

    public function index()
    {
        if (isset($_SESSION['permissao']) && $_SESSION['permissao'] == 3) {

            $id_user = $_SESSION['id_user'];
            $dados['listaMensagens'] = $this->mm->retornaMensagensUser($id_user);

        } else {

            $id_user = 1;
            $dados['listaMensagens'] = $this->mm->retornaMensagensUser($id_user);
            $dados['listaComentarios'] = $this->mm->retornaComment();

        }
        
        // print_r($dados['listaMensagens']);

        $this->load->view('mensagens_usuario', $dados);
    }

    public function enviando()
    {
        if (isset($_SESSION['permissao']) && $_SESSION['permissao'] == 3) {
            // fazer uma condicional para comentarios do livro...
            if (isset($_POST['id_coment_livro']) && $_POST['id_coment_livro'] != '') {

                $id_exemplar = $_POST['id_coment_livro'];
                $id_livro = $this->mm->retornaIdLivro($id_exemplar)[0]['id_livro'];
                
                $array_insere_comentario = array(
                    'nm_titulo' => $_POST['titulo_msg'],
                    'conteudo_coment' => $_POST['desc_msg'],
                    'id_locador' => $_SESSION['id_user'],
                    'id_livro' => $id_livro
                );

                $this->mm->comentaLivro($array_insere_comentario);
                $dados['msg'] = 'Enviado!!';
                $id_user = $_SESSION['id_user'];
                $dados['listaMensagens'] = $this->mm->retornaMensagensUser($id_user);
                $this->load->view('mensagens_usuario', $dados);

            }else {
                $array_inserir = array(
                    'nm_titulo' => $_POST['titulo_msg'],
                    'conteudo' => $_POST['desc_msg'],
                    'id_destino' => 1,
                    'id_envio' => $_SESSION['id_user']
                );
    
                $this->mm->insereMensagem($array_inserir);
                $dados['msg'] = 'Enviado!!';
                $id_user = $_SESSION['id_user'];
                $dados['listaMensagens'] = $this->mm->retornaMensagensUser($id_user);
                $this->load->view('mensagens_usuario', $dados);
               
            }
            
            
        
        }else{
            $verificaUser = $this->mm->verificaUser($_POST['id_dst']);
            if (sizeof($verificaUser) == 1) {
                $array_inserir = array(
                    'nm_titulo' => $_POST['titulo_msg'],
                    'conteudo' => $_POST['desc_msg'],
                    'id_destino' => $_POST['id_dst'],
                    'id_envio' => $_SESSION['id_user']
                );

                $this->mm->insereMensagem($array_inserir);
                $dados['msg'] = 'Enviado!!';
                $id_user = 1;
                $dados['listaMensagens'] = $this->mm->retornaMensagensUser($id_user);
                $this->load->view('mensagens_usuario', $dados);

            }else {
                $dados['msg'] = 'Usuário inválido!';
                $id_user = 1;
                $dados['listaMensagens'] = $this->mm->retornaMensagensUser($id_user);
                $this->load->view('mensagens_usuario', $dados);
            }

        }
    }

    public function lendo()
    {
        $id_msg = $this->uri->segment(2);
        $this->mm->vizualizaMensagem($id_msg);
        
        redirect(base_url('mensagens'));
        
    }

    public function analisaComent()
    {
        $acao = $this->uri->segment(2);
        if ($acao == 1) {
            $id_coment = $this->uri->segment(3);
            $array_update = array(
                'permissao' => true,
                'id_bibliotecario' => $_SESSION['id_user'],
                'id_coment' => $id_coment
            );
            $this->mm->decisaoComent($array_update);
        } else {
            $id_coment = $this->uri->segment(3);
            $array_update = array(
                'permissao' => false,
                'id_bibliotecario' => $_SESSION['id_user'],
                'id_coment' => $id_coment
            );
            $this->mm->decisaoComent($array_update);
        }
        
        redirect(base_url('mensagens'));
        
        
    }
}

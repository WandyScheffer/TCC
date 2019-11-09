<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

	public function index(){
		$this->load->view('login');
    }
    
    public function logar(){
        $this->load->model('login_model', 'lm');

        $verifica = $this->lm->verificaUser($_POST['permissao_user'], $_POST['id_user'], $_POST['pass_user']);


        if (isset($verifica['user']->row()->verificacao)) {

            if (isset($verifica['pass']->row()->verificacao)) {

                $user=$this->lm->dadosUser($_POST['id_user']);

                $data_user = array(
                    'id_user' => $user->row()->id_pessoa,
                    'nm_user' => $user->row()->nm_pessoa, 
                    'permissao' => $user->row()->permissao
                );

                $this->session->set_userdata($data_user);

                redirect(base_url());

            } else {
                $dados['msg'] = 'Senha incorreta';
                // echo $dados['msg'];
                $this->load->view('login', $dados);
            }
        
        }else {
            $dados['msg'] = 'ID de usuário não encontrado para a permissão informada';
            // echo $dados['msg'];
            $this->load->view('login', $dados);
        }

    }

    public function deslogar(){
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nm_user');
        $this->session->unset_userdata('permissao');
        redirect(base_url());
    }
}

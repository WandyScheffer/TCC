<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManuseiaUsers_controller extends CI_Controller
{
    // d1
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuarios_model', 'um');
        
    }

    public function index()
    {
        $this->load->view('cadastro_usuarios');
    }

    public function cadastrar()
    {
        $array_insercao = array(
            
            'nm_pessoa' => strtoupper($_POST['nm_user']),
            'nu_cpf' => $_POST['cpf'],
            'nu_telefone' => $_POST['tel'],
            'email' => strtoupper($_POST['email']),
            'senha' => strtoupper($_POST['senha']),
            'permissao' => $_POST['tp_user'],
            'cep' => $_POST['cep'],
            'complemento' => strtoupper($_POST['complemento']),
            'nu_endereco' => $_POST['nu_endereco']
        );

        // print_r($array_insercao);

        $verificacao = $this->um->insereUser($array_insercao);

        

        if ($verificacao) {
            $dados['verificacao'] = 'Usuário cadastrado com sucesso';
            $this->load->view('cadastro_usuarios', $dados);
        }else {
            $dados['verificacao'] = 'Falha ao cadastrar usuário';
            $this->load->view('cadastro_usuarios', $dados);
        }

        
        
    }

    public function editar() // entra na tela de edicao
    {
        
        $id_user = $this->uri->segment(2);

        $usuario = $this->um->retornaUserUni($id_user);

        // print_r($usuario[0]);

        $this->load->view('cadastro_usuarios', $usuario[0]);
        
        
    }

    public function edicao() // efetua a edição
    {
        $id_where = $this->uri->segment(2);
        // print_r($id_where);
        // print_r($_POST);

        $array_update = array(
            'nm_pessoa' => strtoupper ($_POST['nm_user']),
            'nu_cpf' => $_POST['cpf'],
            'nu_telefone' => $_POST['tel'],
            'email' => strtoupper ($_POST['email']),
            'senha' => strtoupper ($_POST['senha']),
            'cep' => $_POST['cep'],
            'complemento' => strtoupper ($_POST['complemento']),
            'nu_endereco' => $_POST['nu_endereco']
        );

        $this->um->updateUser($array_update, $id_where);

        
        redirect(base_url('pes_users'));
        
    }

    public function mudaStatus()
    {
        $id_where = $this->uri->segment(2);
        $permissao = $this->uri->segment(3);

        if ($permissao>3) {
            $permissao=$permissao-10;
        }else {
            $permissao=$permissao+10;
        }

        $array_update = array('permissao' => $permissao);

        $this->um->updateUser($array_update, $id_where);

        redirect(base_url('pes_users'));
    }
    

    public function mostra()
    {

        $nu_linhas = sizeof($this->um->retornaUsers());

        $config = array(
            "base_url" => base_url('pes_users/p'),
            "per_page" => 3, //limit
            "num_links" => 3,
            "uri_segment" => 3, //offset
            "total_rows" => $nu_linhas,
            "full_tag_open" => "<ul class = 'pagination justify-content-center'>",
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
        $dados['tabelaUsers'] = $this->um->retornaUsers($config['per_page'], $offset);

        // print_r ($dados);
        
        $this->load->view('pesquisa_usuarios', $dados);    
    }
    
    public function pesquisaUser()
    {
        
        
        
        if (isset($_POST['bt_pesquisa']) && $_POST['nm_pessoa'] != '') {
            
            setcookie('nm_pessoa', strtoupper ($_POST['nm_pessoa']));
            setcookie('tp_user', $_POST['tp_user']);
            $dados['nm_pessoa'] = strtoupper ($_POST['nm_pessoa']);
            $dados['tp_user'] = $_POST['tp_user'];
            
            if ($_POST['tp_user'] == 0 || $_POST['tp_user'] == 1 || $_POST['tp_user'] == 2 || $_POST['tp_user'] == 3) {
                        
                $procurar_por = array(
                    'nm_pessoa' => strtoupper ($_POST['nm_pessoa']), 
                    'tp_user' => $_POST['tp_user']
                    );
                
            }else {

                $procurar_por = array(
                    'nm_pessoa' => strtoupper ($_POST['nm_pessoa'])
                );

            }

            $nu_linhas = sizeof($this->um->retornaUsers(null, null, $procurar_por));

            $config = array(
                "base_url" => base_url('pesquisa_users/p'),
                "per_page" => 3, //limit
                "num_links" => 3,
                "uri_segment" => 3, //offset
                "total_rows" => $nu_linhas,
                "full_tag_open" => "<ul class = 'pagination justify-content-center'>",
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
            $dados['tabelaUsers'] = $this->um->retornaUsers($config['per_page'], $offset, $procurar_por);

            

            $this->load->view('pesquisa_usuarios', $dados);    
        }
        else if (!isset($_POST['bt_pesquisa'])) {
            $dados['nm_pessoa'] = get_cookie('nm_pessoa');
            $dados['tp_user'] = get_cookie('tp_user');

            if (get_cookie('tp_user') == 0 || get_cookie('tp_user') == 1 || get_cookie('tp_user') == 2 || get_cookie('tp_user') == 3) {

                $procurar_por = array(
                    'nm_pessoa' => get_cookie('nm_pessoa'),
                    'tp_user' => get_cookie('tp_user')
                );
            } else {

                $procurar_por = array(
                    'nm_pessoa' => get_cookie('nm_pessoa')
                );
            }

            $nu_linhas = sizeof($this->um->retornaUsers(null, null, $procurar_por));

            $config = array(
                "base_url" => base_url('pesquisa_users/p'),
                "per_page" => 3, //limit
                "num_links" => 3,
                "uri_segment" => 3, //offset
                "total_rows" => $nu_linhas,
                "full_tag_open" => "<ul class = 'pagination justify-content-center'>",
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
            $dados['tabelaUsers'] = $this->um->retornaUsers($config['per_page'], $offset, $procurar_por);



            $this->load->view('pesquisa_usuarios', $dados);
        }
        else {
            $dados['paginacao'] = null;
            $dados['tabelaUsers'] = null;
            $dados['nm_pessoa'] = null;
            $dados['tp_user'] = null;
            $this->load->view('pesquisa_usuarios', $dados);
        }



    }
}

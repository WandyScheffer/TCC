<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function verificaUser($permi, $id, $pass){
        $sqlid = 'select 1 as verificacao from "ALUNO4M21".mltb_pessoa where permissao = ? and id_pessoa = ?';
        
        $verifica_user = $this->db->query($sqlid, array($permi, $id));

        $sqlpass = 'select 1 as verificacao from "ALUNO4M21".mltb_pessoa where permissao = ? and senha = ?';

        $verifica_pass= $this->db->query($sqlpass, array($permi, $pass));

        $verif['user'] = $verifica_user;
        $verif['pass'] = $verifica_pass;

        return $verif;

    }

    public function dadosUser($id){
        $sql = 'select id_pessoa, nm_pessoa, permissao from "ALUNO4M21".mltb_pessoa where id_pessoa = ?';
        $dados_user = $this->db->query($sql, array($id));

        return $dados_user;
    }

}
